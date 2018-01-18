<?php

use Illuminate\Database\Seeder;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('produtos')->delete();

      //Produto 01
      DB::table('produtos')->insert([
        'id'=> 1,
         'nome'=>"Conjunto com 2 Cadeiras Eames Premium Branca Base Madeira",
          'caracteristicas'=>"Altura 81 cm Largura 46 cm Profundidade 51 cm; Altura do assento ao chão 44 cm",
          'qtde'=> 20,
          'preco'=> 289.99,
          'fotoDestacada' => '1/cadeira.jpg',
          'created_at' => date("Y-m-d h:i:s"),
      ]);
      DB::table('produtosximagem')->insert([
         'produtos_id'=> 1,
          'foto'=>"1/cadeira.jpg",
          'created_at' => date("Y-m-d h:i:s"),
      ]);
      DB::table('produtosximagem')->insert([
         'produtos_id'=> 1,
          'foto'=>"1/cadeira2.jpg",
          'created_at' => date("Y-m-d h:i:s"),
      ]);
      DB::table('produtosxcategorias')->insert([
         'produtos_id'=> 1,
          'categorias_id'=> 1,
          'created_at' => date("Y-m-d h:i:s"),
      ]);
      DB::table('produtosxcategorias')->insert([
         'produtos_id'=> 1,
          'categorias_id'=> 2,
          'created_at' => date("Y-m-d h:i:s"),
      ]);


      //Produto 02
      DB::table('produtos')->insert([
        'id'=> 2,
         'nome'=>"Porta retrato 35,5X27cm Imbuia",
          'caracteristicas'=>"Painel 35,5X27cm Quattro Ritratto Imbuia Com Natural",
          'qtde'=> 6,
          'preco'=> 47.99,
          'fotoDestacada' => '2/portaRetrato.jpg',
          'created_at' => date("Y-m-d h:i:s"),
      ]);
      DB::table('produtosximagem')->insert([
         'produtos_id'=> 2,
          'foto'=>"2/portaRetrato.jpg",
          'created_at' => date("Y-m-d h:i:s"),
      ]);
      DB::table('produtosxcategorias')->insert([
         'produtos_id'=> 2,
          'categorias_id'=> 1,
          'created_at' => date("Y-m-d h:i:s"),
      ]);


      //Produto 03
      DB::table('produtos')->insert([
        'id'=> 3,
         'nome'=>"Poltrona de Massagem Reclinável Louisiana Couro Sintético Preto Rivatti",
          'caracteristicas'=>"A Poltrona de Massagem Louisiana é exatamente aquilo que você precisa após um cansativo dia de trabalho.",
          'qtde'=> 2,
          'preco'=> 1349.99,
          'fotoDestacada' => '3/poltrona3.jpg',
          'created_at' => date("Y-m-d h:i:s"),
      ]);
      DB::table('produtosximagem')->insert([
         'produtos_id'=> 3,
          'foto'=>"3/poltrona.jpg",
          'created_at' => date("Y-m-d h:i:s"),
      ]);
      DB::table('produtosximagem')->insert([
         'produtos_id'=> 3,
          'foto'=>"3/poltrona2.jpg",
          'created_at' => date("Y-m-d h:i:s"),
      ]);
      DB::table('produtosximagem')->insert([
         'produtos_id'=> 3,
          'foto'=>"3/poltrona3.jpg",
          'created_at' => date("Y-m-d h:i:s"),
      ]);

      DB::table('produtosxcategorias')->insert([
         'produtos_id'=> 3,
          'categorias_id'=> 1,
          'created_at' => date("Y-m-d h:i:s"),
      ]);
      DB::table('produtosxcategorias')->insert([
         'produtos_id'=> 3,
          'categorias_id'=> 2,
          'created_at' => date("Y-m-d h:i:s"),
      ]);

    }
}
