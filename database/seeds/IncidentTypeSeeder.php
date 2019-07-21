<?php

use App\IncidentType;
use Illuminate\Database\Seeder;

class IncidentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incidentType = new IncidentType();
        $incidentType->name = 'Messe';
        $incidentType->save();

        $incidentType = new IncidentType();
        $incidentType->name = 'Technik';
        $incidentType->save();

        $incidentType = new IncidentType();
        $incidentType->name = 'Protempo';
        $incidentType->save();
    }
}
