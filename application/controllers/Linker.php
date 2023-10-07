<?php
/*   ________________________________________
    |                 GarudaCBT              |
    |    https://github.com/garudacbt/cbt    |
    |________________________________________|
*/
 defined("\102\x41\x53\x45\120\x41\x54\x48") or exit("\x4e\x6f\40\144\151\x72\x65\x63\x74\40\163\143\162\x69\160\x74\40\141\x63\x63\145\163\163\40\141\x6c\154\x6f\x77\x65\x64"); class Linker extends CI_Controller { public function __construct() { parent::__construct(); } public function output_json($data, $encode = true) { goto eR1tN; ZlVeg: $data = json_encode($data); goto PQb3D; kCdMF: $this->output->set_content_type("\141\160\x70\154\151\x63\x61\164\x69\157\x6e\x2f\x6a\163\157\156")->set_output($data); goto duY1N; eR1tN: if (!$encode) { goto ylG8x; } goto ZlVeg; PQb3D: ylG8x: goto kCdMF; duY1N: } public function index() { $this->load->view("\x6c\151\x6e\x6b\x65\x72"); } }
