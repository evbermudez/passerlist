<?php

use Illuminate\Database\Seeder;

class PasserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $csvTable = 'passers';
        $csvFilename = public_path().'/csv/pazzers2.csv';
        $seedData = $this->seedFromCSV($csvFilename, ';');
        DB::table($csvTable)->insert($seedData); 

    }

    private function seedFromCSV($filename, $deliminator = ',')
    {

        $header = NULL;
        $data = array();

        if(($handle = fopen($filename, 'r')) !== FALSE)
        {
            while(($row = fgetcsv($handle, 1000, $deliminator)) !== FALSE)
            {
                if(!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }

            }

            fclose($handle);
        }

        return $data;

    }
}
