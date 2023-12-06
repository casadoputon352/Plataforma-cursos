<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cursos = [
            [
                'titulo' => 'Curso Avançado de PHP',
                'instrutor' => 'João Silva',
                'categoria' => 'Programação',
                'preco' => 49.99,
                'avaliacoes' => 4.7,
                'video_url' => 'https://www.youtube.com/embed/seu_codigo_do_youtube',
                'descricao' => 'Explore os conceitos avançados da linguagem PHP e desenvolva habilidades robustas na construção de aplicativos web dinâmicos. Este curso abrange tópicos como design patterns, programação orientada a objetos avançada e técnicas avançadas de manipulação de dados.',
                'carga_horaria' => '40 horas',
                'pre_requisitos' => 'Conhecimento básico de PHP e programação web',
            ],
            [
                'titulo' => 'Curso de Culinária Italiana',
                'instrutor' => 'Maria Oliveira',
                'categoria' => 'Culinária',
                'preco' => 39.99,
                'avaliacoes' => 4.5,
                'video_url' => 'https://www.youtube.com/embed/seu_codigo_do_youtube',
                'descricao' => 'Viaje pela rica tradição culinária italiana com o curso de culinária italiana. Aprenda a preparar pratos autênticos, desde massas frescas até deliciosas sobremesas. Descubra os segredos dos sabores italianos e impressione seus amigos e familiares com suas habilidades culinárias.',
                'carga_horaria' => '30 horas',
                'pre_requisitos' => 'Nenhum',
            ],
            [
                'titulo' => 'Engenharia de Software Moderna',
                'instrutor' => 'Carlos Santos',
                'categoria' => 'Engenharia',
                'preco' => 59.99,
                'avaliacoes' => 4.8,
                'video_url' => 'https://www.youtube.com/embed/seu_codigo_do_youtube',
                'descricao' => 'Mergulhe na engenharia de software moderna com este curso abrangente. Explore metodologias ágeis, práticas DevOps, arquiteturas de microservices e ferramentas essenciais para o desenvolvimento de software eficiente. Adquira habilidades prontas para o mercado e destaque-se como um engenheiro de software de ponta.',
                'carga_horaria' => '50 horas',
                'pre_requisitos' => 'Conhecimento básico de programação',
            ],
            [
                'titulo' => 'Curso de Culinária Francesa',
                'instrutor' => 'Ana Souza',
                'categoria' => 'Gastronomia',
                'preco' => 44.99,
                'avaliacoes' => 4.6,
                'video_url' => 'https://www.youtube.com/embed/seu_codigo_do_youtube',
                'descricao' => 'Descubra a sofisticação da culinária francesa neste curso exclusivo. Aprenda a preparar pratos clássicos franceses, desde entradas requintadas até sobremesas deliciosas. Adquira conhecimentos sobre técnicas avançadas de cozinha e eleve suas habilidades gastronômicas a um novo patamar.',
                'carga_horaria' => '35 horas',
                'pre_requisitos' => 'Nenhum',
            ],
            [
                'titulo' => 'Introdução à Ciência da Computação',
                'instrutor' => 'Pedro Lima',
                'categoria' => 'Ciências',
                'preco' => 29.99,
                'avaliacoes' => 4.2,
                'video_url' => 'https://www.youtube.com/embed/seu_codigo_do_youtube',
                'descricao' => 'Explore os fundamentos da ciência da computação neste curso introdutório. Compreenda os conceitos essenciais, algoritmos e estruturas de dados que formam a base da computação. Ideal para iniciantes, este curso proporciona uma visão abrangente do mundo fascinante da ciência da computação.',
                'carga_horaria' => '25 horas',
                'pre_requisitos' => 'Nenhum',
            ],
            [
                'titulo' => 'Nutrição e Saúde',
                'instrutor' => 'Fernanda Martins',
                'categoria' => 'Nutrição',
                'preco' => 34.99,
                'avaliacoes' => 4.4,
                'video_url' => 'https://www.youtube.com/embed/seu_codigo_do_youtube',
                'descricao' => 'Aprofunde-se no universo da nutrição e saúde com este curso abrangente. Descubra os princípios fundamentais da nutrição, aprenda a criar planos alimentares equilibrados e compreenda como a alimentação impacta a saúde geral. Adquira conhecimentos práticos para promover um estilo de vida saudável.',
                'carga_horaria' => '30 horas',
                'pre_requisitos' => 'Nenhum',
            ],
        ];

        DB::table('cursos')->insert($cursos);
    }
}
