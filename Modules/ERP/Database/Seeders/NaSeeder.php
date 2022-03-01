<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\Na;
use Illuminate\Database\Seeder;

class NaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aArrayRecord = array(
            array("na_code" => 161, "na_name" => "LodhranII", "mna_name" => "MianMuhammadShafiq", "short_description" => "NA161"),
            array("na_code" => 170, "na_name" => "BahawalpurI", "mna_name" => "MrMuhammadFarooqAzamMalik", "short_description" => "NA170"),
            array("na_code" => 153, "na_name" => "KhanewalIV", "mna_name" => "ChaudhryIftikharNazir", "short_description" => "NA153"),
            array("na_code" => 187, "na_name" => "LayyahI", "mna_name" => "MrAbdulMajeedKhan", "short_description" => "NA187"),
            array("na_code" => 135, "na_name" => "LahoreXIII", "mna_name" => "MalikKaramatAliKhokhar", "short_description" => "NA135"),
            array("na_code" => 104, "na_name" => "FaisalabadIV", "mna_name" => "ChMuhammadShahbazBabar", "short_description" => "NA104"),
            array("na_code" => 117, "na_name" => "NankanaSahibI", "mna_name" => "ChMuhammadBarjeesTahir", "short_description" => "NA117"),
            array("na_code" => 113, "na_name" => "TobaTekSinghIII", "mna_name" => "MrRiazFatyana", "short_description" => "NA113"),
            array("na_code" => 146, "na_name" => "PakpattanII", "mna_name" => "RanaIradatSharifKhan", "short_description" => "NA146"),
            array("na_code" => 189, "na_name" => "DGKhanI", "mna_name" => "MrKhawjaSherazMehmood", "short_description" => "NA189"),
            array("na_code" => 89, "na_name" => "SargodhaII", "mna_name" => "MrMohsinNawazRanjha", "short_description" => "NA89"),
            array("na_code" => 55, "na_name" => "AttockI", "mna_name" => "MrTahirSadiq", "short_description" => "NA55"),
            array("na_code" => 56, "na_name" => "AttockII", "mna_name" => "MalikSohailKhan", "short_description" => "NA56"),
            array("na_code" => 57, "na_name" => "RawalpindiI", "mna_name" => "MrSadaqatAliKhan", "short_description" => "NA57"),
            array("na_code" => 58, "na_name" => "RawalpindiII", "mna_name" => "RajaPervaizAshraf", "short_description" => "NA58"),
            array("na_code" => 59, "na_name" => "RawalpindiIII", "mna_name" => "MrGhulamSarwarKhan", "short_description" => "NA59"),
            array("na_code" => 60, "na_name" => "RawalpindiIV", "mna_name" => "SheikhRashidShafique", "short_description" => "NA60"),
            array("na_code" => 61, "na_name" => "RawalpindiV", "mna_name" => "MrAamerMehmoodKiani", "short_description" => "NA61"),
            array("na_code" => 62, "na_name" => "RawalpindiVI", "mna_name" => "SheikhRashidAhmed", "short_description" => "NA62"),
            array("na_code" => 63, "na_name" => "RawalpindiVII", "mna_name" => "MrMansoorHayatKhan", "short_description" => "NA63"),
            array("na_code" => 64, "na_name" => "ChakwalI", "mna_name" => "SardarZulfiqarAliKhanDullah", "short_description" => "NA64"),
            array("na_code" => 66, "na_name" => "JhelumI", "mna_name" => "ChaudharyFarrukhAltaf", "short_description" => "NA66"),
            array("na_code" => 71, "na_name" => "GujratIV", "mna_name" => "ChaudhryAbidRaza", "short_description" => "NA71"),
            array("na_code" => 72, "na_name" => "SialkotI", "mna_name" => "ChaudhryArmaghanSubhani", "short_description" => "NA72"),
            array("na_code" => 77, "na_name" => "NarowalI", "mna_name" => "MsMehnazAkberAziz", "short_description" => "NA77"),
            array("na_code" => 80, "na_name" => "GujranwalaII", "mna_name" => "ChMehmoodBashirVirk", "short_description" => "NA80"),
            array("na_code" => 81, "na_name" => "GujranwalaIII", "mna_name" => "MrKhurramDastgirKhan", "short_description" => "NA81"),
            array("na_code" => 83, "na_name" => "GujranwalaV", "mna_name" => "ChaudhryZulfiqarAliBhindar", "short_description" => "NA83"),
            array("na_code" => 86, "na_name" => "MandiBahauddinII", "mna_name" => "MrNasirIqbalBosal", "short_description" => "NA86"),
            array("na_code" => 91, "na_name" => "SargodhaIV", "mna_name" => "ChAamirSultanCheema", "short_description" => "NA91"),
            array("na_code" => 96, "na_name" => "MianwaliII", "mna_name" => "MrAmjidAliKhan", "short_description" => "NA96"),
            array("na_code" => 98, "na_name" => "BhakkarII", "mna_name" => "DrMuhammadAfzalKhanDhandla", "short_description" => "NA98"),
            array("na_code" => 108, "na_name" => "FaisalabadVIII", "mna_name" => "MrFarrukhHabib", "short_description" => "NA108"),
            array("na_code" => 119, "na_name" => "SheikhupuraI", "mna_name" => "MrRahatAmanUllahBhatti", "short_description" => "NA119"),
            array("na_code" => 121, "na_name" => "SheikhupuraIII", "mna_name" => "MianJavedLatif", "short_description" => "NA121"),
            array("na_code" => 124, "na_name" => "LahoreII", "mna_name" => "MrShahidKhaqanAbbasi", "short_description" => "NA124"),
            array("na_code" => 128, "na_name" => "LahoreVI", "mna_name" => "SheikhRohaleAsghar", "short_description" => "NA128"),
            array("na_code" => 132, "na_name" => "LahoreX", "mna_name" => "MianMuhammadShehbazSharif", "short_description" => "NA132"),
            array("na_code" => 140, "na_name" => "KasurIV", "mna_name" => "SardarTalibHassanNakai", "short_description" => "NA140"),
            array("na_code" => 143, "na_name" => "OkaraIII", "mna_name" => "RaoMuhammadAjmalKhan", "short_description" => "NA143"),
            array("na_code" => 148, "na_name" => "SahiwalII", "mna_name" => "ChaudryMuhammadAshraf", "short_description" => "NA148"),
            array("na_code" => 150, "na_name" => "KhanewalI", "mna_name" => "SyedFakharImam", "short_description" => "NA150"),
            array("na_code" => 163, "na_name" => "VehariII", "mna_name" => "MrSajidMehdi", "short_description" => "NA163")

        );
        foreach ($aArrayRecord as $aRecord) {
            Na::firstOrCreate($aRecord);
        }
    }
}
