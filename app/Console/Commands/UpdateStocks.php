<?php

namespace App\Console\Commands;

use App\User;
use App\Stock;
use Illuminate\Console\Command;

class UpdateStocks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:stocks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Log::info("Update Stock Cron Started !");

        $users = User::all();

        foreach( $users as $user ){
            $url = 'https://ws.finscreener.org:8443/overstocks/get';

		$body = '{"typTabulky":"OverBought","strankovanie":{"cisloStranky":1,"pocetZaznamovNaStranku":100},"zoradenie":{"idStlpca":"4","vzostupne":false},"idu":-1,"idcps":[607,873,1762,2174,3175,3218,3919,4178,4268,4775,4813,4817,4822,4823,4871,4886,4894,4897,4916,4928,4978,5010,5020,5079,5080,5241,5297,5337,5383,5395,5426,5439,5454,5529,5569,5577,5580,5698,5748,5817,5874,5910,5911,6077,6092,6119,6123,6157,6185,6225,6336,6346,6360,6383,6392,6407,6461,6489,6494,6509,6559,6588,6603,6620,6638,6675,6714,6723,6878,6931,6982,7045,7076,7113,7158,7181,7252,7371,7396,7510,7511,7516,7538,28027,28028,29310,29456,40884,40953,42604,48803,49035,49501,49716,55083,55282,55325,55388,58785,61997,63222]}';
		$client = new \GuzzleHttp\Client([
			'headers' => [ 'Content-Type' => 'application/json' ]
		]);
		$response = $client->request('POST', $url, [
			'body' => $body
		]);	
		
		$stockData = $response->getBody()->getContents();
		$stockData = json_decode($stockData);
		if( json_last_error() === JSON_ERROR_NONE ){
			
			//dump($stockData);exit;

			foreach( $stockData->zoznamCennychPapierov as $oneStockData ){
				$months = [
					1 => '0',
					3 => '0',
					6 => '0',
					12 => '0',
				];

				foreach( $oneStockData->performances as $performance ){
					$months[ $performance->mesiacovDozadu ] = $performance->hodnota; 
				}
				

				Stock::updateOrCreate(
					[
						'user_id' => $user->id, 
						'stock_company_code' => $oneStockData->ticker,

					],
					[
						'idcp' => $oneStockData->idcp,
						'stock_company_description' => $oneStockData->nazov,
						'price' => $oneStockData->price,
						'change' => $oneStockData->changePercent,
						'rsi' => $oneStockData->rsi,
						'macd' => $oneStockData->macd,
						'pe_ratio' => $oneStockData->peRatio,
						'volume' => $oneStockData->volume,
						'52_week' => $oneStockData->high52Wk,
						'1_m' => $months[1],
						'3_m' => $months[3],
						'6_m' => $months[6],
						'12_m' => $months[12],
					]
				);
			}
            \Log::info( $user->name . " stocks has been updated !");
		}else{
            \Log::info( $user->name . " stocks cannot be updated - Response Format Is Not Valid");
		}

        }
        \Log::info("Update Stock Cron Finished !");
        return 0;
    }
}
