<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'AHMED TEA','logo'=>'AHMED_TEA.jpg'],
            ['name' => 'ALHAMRA','logo'=>'ALHAMRA.jpg'],
            ['name' => 'FALCON PACK','logo'=>'FALCON_PACK.jpg'],
            ['name' => 'MARJAN','logo'=>'MARJAN.jpg'],
            ['name' => 'MINISTTRY OF PRESIDENTIAL AFFAIRS','logo'=>'MINISTTRY_OF_PRESIDENTIAL_AFFAIRS.jpg'],
            ['name' => 'RAKEZ','logo'=>'RAKEZ.jpg'],
            ['name' => 'SOBHA','logo'=>'SOBHA.jpg'],
            ['name' => 'STREIT','logo'=>'STREIT.jpg'],
            ['name' => 'SUNREEF YACHTS','logo'=>'SUNREEF_YACHTS.jpg'],
            ['name' => 'U PAK','logo'=>'U-PAK.jpg'],
            ['name' => 'UTICO','logo'=>'UTICO.jpg'],
            ['name' => 'YAMUNA DENSONS','logo'=>'YAMUNA_DENSONS.jpg'],
            ['name' => 'Ministry of Interior', 'logo' => null],
            ['name' => 'Ministry of Health' , 'logo' => null],
            ['name' => 'Ministry of Public Works' , 'logo' => null],
            ['name' => 'MINISTTRY OF INFRASTRUCURE' , 'logo' => 'MINISTTRY_OF_INFRASTRUCURE.jpg'],
            ['name' => 'BANYAN TREE' , 'logo' => NULL ],
            ['name' => 'Bab Al Bahar' , 'logo' => NULL ],
            ['name' => 'Crown Prince Court' , 'logo' => NULL ],
            ['name' => 'Streit Group' , 'logo' => 'Streit Group.jpg' ],
            ['name' => 'RAK Economic Zone' , 'logo' => 'RAK Economic Zone.jpg' ],
            ['name' => 'AG Aluminum' , 'logo' => 'AG Aluminum.jpg' ],
            ['name' => 'FINE' , 'logo' => 'FINE.jpg' ],
            ['name' => 'iPack' , 'logo' => 'iPack.jpg' ],
            ['name' => 'Fence International' , 'logo' => 'Fence_International.jpg' ],
            ['name' => 'INEGRA' , 'logo' => null ],
            ['name' => 'Etihad Railway' , 'logo' => 'Etihad_Railway.jpg' ],
            ['name' => 'Ashok leyland' , 'logo' => 'Ashok_leyland.jpg' ],
            ['name' => 'Hira' , 'logo' => 'Hira.jpg' ],
            ['name' => 'Ginox' , 'logo' => 'Ginox.jpg' ],
            ['name' => 'Kalister' , 'logo' => 'Kalister.jpg' ],
            ['name' => 'Mabani' , 'logo' => 'Mabani.jpg' ],
            ['name' => 'Crcc' , 'logo' => 'Crcc.jpg' ],
            ['name' => 'Al Jazeera Port' , 'logo' => 'Al_Jazeera_Port.jpg' ],
            ['name' => 'Universal carton' , 'logo' => 'Universal_carton.jpg' ],
            ['name' => 'fine hygienic' , 'logo' => 'fine_hygienic.jpg' ],
            ['name' => 'IAG' , 'logo' => 'IAG.jpg' ],
            ['name' => 'Lafarge cement' , 'logo' => 'Lafarge_cement.jpg' ],
            ['name' => 'TenCate' , 'logo' => 'TenCate.jpg' ],
            ['name' => 'Al Ain Flour Mill' , 'logo' => 'Al_Ain_Flour_Mill.jpg' ],
            ['name' => 'Dabur' , 'logo' => 'Dabur.jpg' ],
            ['name' => 'NPC' , 'logo' => 'NPC.jpg' ],
            ['name' => 'RAK PORTS' , 'logo' => 'RAK_PORTS.jpg' ],
            ['name' => 'RAS AL KHAIMA MANICIPALITY' , 'logo' => 'RAS_AL_KHAIMA_MANICIPALITY.jpg' ],
            ['name' => 'CROWN PRINCE COURT' , 'logo' => 'CROWN_PRINCE_COURT.jpg' ],
            ['name' => 'Sharja Muncipality' , 'logo' => 'Sharja_Muncipality.jpg' ],
            ['name' => 'Jotun' , 'logo' => 'Jotun.jpg' ],
            ['name' => 'Rixos' , 'logo' => 'Rixos.jpg' ],
            ['name' => 'MacDonalds' , 'logo' => 'MacDonalds.jpg' ],
            ['name' => 'TAG' , 'logo' => 'TAG.jpg' ],
        ];
        foreach ($data as $key => $value) {
            Client::create([
                'name' => $value['name'],
                'logo' => $value['logo']
            ]);
        }
    }
}
