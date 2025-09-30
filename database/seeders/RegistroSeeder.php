<?php

namespace Database\Seeders;

use App\Models\Registro;
use App\Models\Sensor;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use faker\Factory as Faker;

class RegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');
        $sensores = Sensor::all();

        $unidadesPorTipo = [
            'temperatura' => 'ºC',
            'umidade' => '%',
            'luminosidade' => 'Lux',
            'presenca' => 'ON',
        ];

        $dataAtual = Carbon::now('America/Sao_Paulo')->subMonth();
        $dataFinal = Carbon::now('America/Sao_Paulo');

        $count = 0; // Inicializa o contador

        while ($dataAtual->lessThanOrEqualTo($dataFinal) && $count < 60) {
            foreach ($sensores as $sensor) {
                if ($count >= 60) { // Condição de parada dentro do loop interno
                    break 2; // Interrompe ambos os loops
                }

                $tipo = $sensor->tipo;

                $unidade = $unidadesPorTipo[$tipo] ?? '';

                switch ($tipo) {
                    case 'temperatura':
                        $valor = $faker->randomFloat(2, 15, 35);
                        break;
                    case 'umidade':
                        $valor = $faker->randomFloat(2, 20, 90);
                        break;
                    case 'luminosidade':
                        $valor = $faker->numberBetween(0, 1000);
                        break;
                    case 'presenca':
                        $valor = $faker->randomElement(['ON', 'OFF']);
                        break;
                    default:
                        $valor = $faker->randomFloat(2, 0, 100);
                        break;
                }
                Registro::create([
                    'sensor_id' => $sensor->id,
                    'valor' => $valor,
                    'unidade' => $unidade,
                    'data_hora' => $dataAtual->format('Y-m-d H:i:s')
                ]);

                $count++; // Incrementa o contador a cada registro criado
            }
            $dataAtual->addMinutes(10);
        }
    }
}