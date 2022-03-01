<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\Pp;
use Illuminate\Database\Seeder;

class PpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aArrayRecord = array(
            array("pp_code" => 165, "pp_name" => "Lahore", "mpa_name" => "MalikSaifUlMalookKhokhar", "na_id" => 38, "short_description" => "PP165"),
            array("pp_code" => 166, "pp_name" => "Lahore", "mpa_name" => "MrRamzanSaddique", "na_id" => NULL, "short_description" => "PP166"),
            array("pp_code" => 167, "pp_name" => "Lahore", "mpa_name" => "MrNazirAhmadChohan", "na_id" => NULL, "short_description" => "PP167"),
            array("pp_code" => 168, "pp_name" => "Lahore", "mpa_name" => "MalikAsadAli", "na_id" => NULL, "short_description" => "PP168"),
            array("pp_code" => 170, "pp_name" => "Lahore", "mpa_name" => "MrMuhammadAminZulqarnain", "na_id" => 2, "short_description" => "PP170"),
            array("pp_code" => 171, "pp_name" => "Lahore", "mpa_name" => "RanaMuhammadTariq", "na_id" => 2, "short_description" => "PP171"),
            array("pp_code" => 173, "pp_name" => "Lahore", "mpa_name" => "MrSarfrazHussain", "na_id" => NULL, "short_description" => "PP173"),
            array("pp_code" => 174, "pp_name" => "Kasur", "mpa_name" => "MrMuhammadNaeemSafdar", "na_id" => NULL, "short_description" => "PP174"),
            array("pp_code" => 175, "pp_name" => "Kasur", "mpa_name" => "MalikAhmadSaeedKhan", "na_id" => NULL, "short_description" => "PP175"),
            array("pp_code" => 176, "pp_name" => "Kasur", "mpa_name" => "MalikMuhammadAhmadKhan", "na_id" => NULL, "short_description" => "PP176"),
            array("pp_code" => 177, "pp_name" => "Kasur", "mpa_name" => "MrMuhammadHashimDogar", "na_id" => NULL, "short_description" => "PP177"),
            array("pp_code" => 178, "pp_name" => "Kasur", "mpa_name" => "SheikhAllaudDin", "na_id" => NULL, "short_description" => "PP178"),
            array("pp_code" => 179, "pp_name" => "Kasur", "mpa_name" => "MalikMukhtarAhmad", "na_id" => NULL, "short_description" => "PP179"),
            array("pp_code" => 180, "pp_name" => "Kasur", "mpa_name" => "SardarMuhammadAsifNakai", "na_id" => NULL, "short_description" => "PP180"),
            array("pp_code" => 181, "pp_name" => "Kasur", "mpa_name" => "RanaMohammadIqbalKhan", "na_id" => 39, "short_description" => "PP181"),
            array("pp_code" => 182, "pp_name" => "Kasur", "mpa_name" => "MrMuhammadIlyasKhan", "na_id" => 39, "short_description" => "PP182"),
            array("pp_code" => 183, "pp_name" => "Okara", "mpa_name" => "MrJavedAlloUdDinSajid", "na_id" => NULL, "short_description" => "PP183"),
            array("pp_code" => 184, "pp_name" => "Okara", "mpa_name" => "SyedaMaimanatMohsin", "na_id" => NULL, "short_description" => "PP184"),
            array("pp_code" => 185, "pp_name" => "Okara", "mpa_name" => "ChIftikharHussainChhachhar", "na_id" => NULL, "short_description" => "PP185"),
            array("pp_code" => 186, "pp_name" => "Okara", "mpa_name" => "MrNoorulAminWattoo", "na_id" => NULL, "short_description" => "PP186"),
            array("pp_code" => 187, "pp_name" => "Okara", "mpa_name" => "MrAliAbbas", "na_id" => 40, "short_description" => "PP187"),
            array("pp_code" => 188, "pp_name" => "Okara", "mpa_name" => "MianYawarZaman", "na_id" => 40, "short_description" => "PP188"),
            array("pp_code" => 189, "pp_name" => "Okara", "mpa_name" => "MrMuneebulHaq", "na_id" => NULL, "short_description" => "PP189"),
            array("pp_code" => 190, "pp_name" => "Okara", "mpa_name" => "MrGhulamRaza", "na_id" => NULL, "short_description" => "PP190"),
            array("pp_code" => 191, "pp_name" => "Pakpattan", "mpa_name" => "MianMuhammadFarrukhMumtazManeka", "na_id" => NULL, "short_description" => "PP191"),
            array("pp_code" => 192, "pp_name" => "Pakpattan", "mpa_name" => "MrNaveedAli", "na_id" => NULL, "short_description" => "PP192"),
            array("pp_code" => 193, "pp_name" => "Pakpattan", "mpa_name" => "MrAhmadShahKhagga", "na_id" => 9, "short_description" => "PP193"),
            array("pp_code" => 194, "pp_name" => "Pakpattan", "mpa_name" => "MrMuhammadNaeem", "na_id" => 9, "short_description" => "PP194"),
            array("pp_code" => 195, "pp_name" => "Pakpattan", "mpa_name" => "MrKashifAliChishty", "na_id" => 9, "short_description" => "PP195"),
            array("pp_code" => 196, "pp_name" => "Sahiwal", "mpa_name" => "MrKhizerHayat", "na_id" => NULL, "short_description" => "PP196"),
            array("pp_code" => 197, "pp_name" => "Sahiwal", "mpa_name" => "MalikNadeemKamran", "na_id" => NULL, "short_description" => "PP197"),
            array("pp_code" => 198, "pp_name" => "Sahiwal", "mpa_name" => "MrMuhammadArshadMalik", "na_id" => 41, "short_description" => "PP198"),
            array("pp_code" => 199, "pp_name" => "Sahiwal", "mpa_name" => "MrNaveedAslamKhanLodhi", "na_id" => 41, "short_description" => "PP199"),
            array("pp_code" => 200, "pp_name" => "Sahiwal", "mpa_name" => "RanaRiazAhmad", "na_id" => NULL, "short_description" => "PP200"),
            array("pp_code" => 201, "pp_name" => "Sahiwal", "mpa_name" => "SyedSumsamAliShahBukhari", "na_id" => NULL, "short_description" => "PP201"),
            array("pp_code" => 202, "pp_name" => "Sahiwal", "mpa_name" => "MalikNaumanAhmadLangrial", "na_id" => NULL, "short_description" => "PP202"),
            array("pp_code" => 203, "pp_name" => "Khanewal", "mpa_name" => "SyedKhawarAliShah", "na_id" => 42, "short_description" => "PP203"),
            array("pp_code" => 204, "pp_name" => "Khanewal", "mpa_name" => "SyedHussainJahaniaGardezi", "na_id" => 42, "short_description" => "PP204"),
            array("pp_code" => 205, "pp_name" => "Khanewal", "mpa_name" => "MrHamidYarHiraj", "na_id" => NULL, "short_description" => "PP205"),
            array("pp_code" => 206, "pp_name" => "Khanewal", "mpa_name" => "MrNishatAhmadKhan", "na_id" => NULL, "short_description" => "PP206"),
            array("pp_code" => 208, "pp_name" => "Khanewal", "mpa_name" => "MrBabarHussainAbid", "na_id" => NULL, "short_description" => "PP208"),
            array("pp_code" => 210, "pp_name" => "Khanewal", "mpa_name" => "MrAttaUrRehman", "na_id" => 3, "short_description" => "PP210"),
            array("pp_code" => 211, "pp_name" => "Multan", "mpa_name" => "SyedAliHaiderGilani", "na_id" => NULL, "short_description" => "PP211"),
            array("pp_code" => 212, "pp_name" => "Multan", "mpa_name" => "MrMuhammdSaleemAkhtar", "na_id" => NULL, "short_description" => "PP212"),
            array("pp_code" => 214, "pp_name" => "Multan", "mpa_name" => "MrMuhammadZaheerurDinKhanAlizai", "na_id" => NULL, "short_description" => "PP214"),
            array("pp_code" => 216, "pp_name" => "Multan", "mpa_name" => "MrMuhammadNadeemQureshi", "na_id" => NULL, "short_description" => "PP216"),
            array("pp_code" => 219, "pp_name" => "Multan", "mpa_name" => "MrMuhammadAkhtar", "na_id" => NULL, "short_description" => "PP219"),
            array("pp_code" => 220, "pp_name" => "Multan", "mpa_name" => "MianTariqAbdullah", "na_id" => NULL, "short_description" => "PP220"),
            array("pp_code" => 223, "pp_name" => "Multan", "mpa_name" => "MsNaghmaMushtaq", "na_id" => NULL, "short_description" => "PP223"),
            array("pp_code" => 225, "pp_name" => "Lodhran", "mpa_name" => "PeerZadaMuhammadJahangirBhutta", "na_id" => NULL, "short_description" => "PP225"),
        );

        foreach ($aArrayRecord as $aRecord) {
            Pp::firstOrCreate($aRecord);
        }

        //
    }
}