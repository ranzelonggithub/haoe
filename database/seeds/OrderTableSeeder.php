<?php

use Illuminate\Database\Seeder;
use App\shop;

class OrderTableSeeder extends Seeder {

  public function run()
  {
    DB::table('orders')->delete();

    for ($i=1; $i < 30; $i++) {
      orders::create([
        'uid'   => $i,
        'aid'    => $i,
        'uid'    => $i,
        'fid' => '#1##2##3##4##346#',
        'sid' => $i,
        'time' => '2018-'.$i.'-25',
        'state' => 0,
        'picture' => $i,
        'shopName' => $i,
        'shopPhone' => $i,
        'orderNum' => $i,
        'goodsName' => '',
        'goodsAmount' => '1'.$i,
        'subtotal' => '7'.$i,
        'payment' => '9'.$i,
        'deliPrice' => '2'.$i,
        'delivery' => '海运',
        'recName' => 'Alice'.$i,
        'recPhone' => '15674529546',
        'autoAddr' => '684765148465'.$i,
        'detailAddr' => '864354145864346'.$i,
        'recSex' => 0,
        'comment' => '加芥末',
        'state' => 1,
        'created_at' => '2018-'.$i.'-25',
        'updated_at' => '2018-'.$i.'-25',
        'udeleted_at' => '2018-'.$i.'-25',
		
      ]);
    }
  }

}
