<?php
/*   ________________________________________
    |                 GarudaCBT              |
    |    https://github.com/garudacbt/cbt    |
    |________________________________________|
*/
 defined("\102\x41\x53\x45\120\101\x54\x48") or exit("\116\157\40\144\151\x72\145\x63\164\40\163\143\x72\x69\160\x74\x20\141\x63\143\145\163\163\40\x61\x6c\154\157\x77\x65\x64"); class Linker extends CI_Controller { public function __construct() { parent::__construct(); } public function output_json($data, $encode = true) { goto dU0ud; SWuOe: $this->output->set_content_type("\141\x70\160\154\151\143\141\x74\151\x6f\156\x2f\x6a\163\157\x6e")->set_output($data); goto FkN3H; dU0ud: if (!$encode) { goto QXWjm; } goto nDmb5; nDmb5: $data = json_encode($data); goto RUYpP; RUYpP: QXWjm: goto SWuOe; FkN3H: } public function index() { $this->load->view("\x6c\x69\x6e\x6b\145\162"); } }
