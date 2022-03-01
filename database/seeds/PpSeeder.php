<?php

use App\Models\Pp;
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
            array("pp_code" => 165, "pp_name" => "Lahore", "mpa_name" => "MalikSaifUlMalookKhokhar", "short_description" => "PP165"),
            array("pp_code" => 166, "pp_name" => "Lahore", "mpa_name" => "MrRamzanSaddique", "short_description" => "PP166"),
            array("pp_code" => 167, "pp_name" => "Lahore", "mpa_name" => "MrNazirAhmadChohan", "short_description" => "PP167"),
            array("pp_code" => 168, "pp_name" => "Lahore", "mpa_name" => "MalikAsadAli", "short_description" => "PP168"),
            array("pp_code" => 170, "pp_name" => "Lahore", "mpa_name" => "MrMuhammadAminZulqarnain", "short_description" => "PP170"),
            array("pp_code" => 171, "pp_name" => "Lahore", "mpa_name" => "RanaMuhammadTariq", "short_description" => "PP171"),
            array("pp_code" => 173, "pp_name" => "Lahore", "mpa_name" => "MrSarfrazHussain", "short_description" => "PP173"),
            array("pp_code" => 174, "pp_name" => "Kasur", "mpa_name" => "MrMuhammadNaeemSafdar", "short_description" => "PP174"),
            array("pp_code" => 175, "pp_name" => "Kasur", "mpa_name" => "MalikAhmadSaeedKhan", "short_description" => "PP175"),
            array("pp_code" => 176, "pp_name" => "Kasur", "mpa_name" => "MalikMuhammadAhmadKhan", "short_description" => "PP176"),
            array("pp_code" => 177, "pp_name" => "Kasur", "mpa_name" => "MrMuhammadHashimDogar", "short_description" => "PP177"),
            array("pp_code" => 178, "pp_name" => "Kasur", "mpa_name" => "SheikhAllaudDin", "short_description" => "PP178"),
            array("pp_code" => 179, "pp_name" => "Kasur", "mpa_name" => "MalikMukhtarAhmad", "short_description" => "PP179"),
            array("pp_code" => 180, "pp_name" => "Kasur", "mpa_name" => "SardarMuhammadAsifNakai", "short_description" => "PP180"),
            array("pp_code" => 181, "pp_name" => "Kasur", "mpa_name" => "RanaMohammadIqbalKhan", "short_description" => "PP181"),
            array("pp_code" => 182, "pp_name" => "Kasur", "mpa_name" => "MrMuhammadIlyasKhan", "short_description" => "PP182"),
            array("pp_code" => 183, "pp_name" => "Okara", "mpa_name" => "MrJavedAlloUdDinSajid", "short_description" => "PP183"),
            array("pp_code" => 184, "pp_name" => "Okara", "mpa_name" => "SyedaMaimanatMohsin", "short_description" => "PP184"),
            array("pp_code" => 185, "pp_name" => "Okara", "mpa_name" => "ChIftikharHussainChhachhar", "short_description" => "PP185"),
            array("pp_code" => 186, "pp_name" => "Okara", "mpa_name" => "MrNoorulAminWattoo", "short_description" => "PP186"),
            array("pp_code" => 187, "pp_name" => "Okara", "mpa_name" => "MrAliAbbas", "short_description" => "PP187"),
            array("pp_code" => 188, "pp_name" => "Okara", "mpa_name" => "MianYawarZaman", "short_description" => "PP188"),
            array("pp_code" => 189, "pp_name" => "Okara", "mpa_name" => "MrMuneebulHaq", "short_description" => "PP189"),
            array("pp_code" => 190, "pp_name" => "Okara", "mpa_name" => "MrGhulamRaza", "short_description" => "PP190"),
            array("pp_code" => 191, "pp_name" => "Pakpattan", "mpa_name" => "MianMuhammadFarrukhMumtazManeka", "short_description" => "PP191"),
            array("pp_code" => 192, "pp_name" => "Pakpattan", "mpa_name" => "MrNaveedAli", "short_description" => "PP192"),
            array("pp_code" => 193, "pp_name" => "Pakpattan", "mpa_name" => "MrAhmadShahKhagga", "short_description" => "PP193"),
            array("pp_code" => 194, "pp_name" => "Pakpattan", "mpa_name" => "MrMuhammadNaeem", "short_description" => "PP194"),
            array("pp_code" => 195, "pp_name" => "Pakpattan", "mpa_name" => "MrKashifAliChishty", "short_description" => "PP195"),
            array("pp_code" => 196, "pp_name" => "Sahiwal", "mpa_name" => "MrKhizerHayat", "short_description" => "PP196"),
            array("pp_code" => 197, "pp_name" => "Sahiwal", "mpa_name" => "MalikNadeemKamran", "short_description" => "PP197"),
            array("pp_code" => 198, "pp_name" => "Sahiwal", "mpa_name" => "MrMuhammadArshadMalik", "short_description" => "PP198"),
            array("pp_code" => 199, "pp_name" => "Sahiwal", "mpa_name" => "MrNaveedAslamKhanLodhi", "short_description" => "PP199"),
            array("pp_code" => 200, "pp_name" => "Sahiwal", "mpa_name" => "RanaRiazAhmad", "short_description" => "PP200"),
            array("pp_code" => 201, "pp_name" => "Sahiwal", "mpa_name" => "SyedSumsamAliShahBukhari", "short_description" => "PP201"),
            array("pp_code" => 202, "pp_name" => "Sahiwal", "mpa_name" => "MalikNaumanAhmadLangrial", "short_description" => "PP202"),
            array("pp_code" => 203, "pp_name" => "Khanewal", "mpa_name" => "SyedKhawarAliShah", "short_description" => "PP203"),
            array("pp_code" => 204, "pp_name" => "Khanewal", "mpa_name" => "SyedHussainJahaniaGardezi", "short_description" => "PP204"),
            array("pp_code" => 205, "pp_name" => "Khanewal", "mpa_name" => "MrHamidYarHiraj", "short_description" => "PP205"),
            array("pp_code" => 206, "pp_name" => "Khanewal", "mpa_name" => "MrNishatAhmadKhan", "short_description" => "PP206"),
            array("pp_code" => 208, "pp_name" => "Khanewal", "mpa_name" => "MrBabarHussainAbid", "short_description" => "PP208"),
            array("pp_code" => 210, "pp_name" => "Khanewal", "mpa_name" => "MrAttaUrRehman", "short_description" => "PP210"),
            array("pp_code" => 211, "pp_name" => "Multan", "mpa_name" => "SyedAliHaiderGilani", "short_description" => "PP211"),
            array("pp_code" => 212, "pp_name" => "Multan", "mpa_name" => "MrMuhammdSaleemAkhtar", "short_description" => "PP212"),
            array("pp_code" => 214, "pp_name" => "Multan", "mpa_name" => "MrMuhammadZaheerurDinKhanAlizai", "short_description" => "PP214"),
            array("pp_code" => 216, "pp_name" => "Multan", "mpa_name" => "MrMuhammadNadeemQureshi", "short_description" => "PP216"),
            array("pp_code" => 219, "pp_name" => "Multan", "mpa_name" => "MrMuhammadAkhtar", "short_description" => "PP219"),
            array("pp_code" => 220, "pp_name" => "Multan", "mpa_name" => "MianTariqAbdullah", "short_description" => "PP220"),
            array("pp_code" => 223, "pp_name" => "Multan", "mpa_name" => "MsNaghmaMushtaq", "short_description" => "PP223"),
            array("pp_code" => 225, "pp_name" => "Lodhran", "mpa_name" => "PeerZadaMuhammadJahangirBhutta", "short_description" => "PP225"),
        );

        foreach ($aArrayRecord as $aRecord) {
            Pp::firstOrCreate($aRecord);
        }

        //
    }
}
