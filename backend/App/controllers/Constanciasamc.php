<?php
namespace App\controllers;
require_once dirname(__DIR__) . '/../public/librerias/fpdf/fpdf.php';
require_once dirname(__DIR__) . '/../public/librerias/phpqrcode/qrlib.php';
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\General as GeneralDao;

class Constanciasamc extends Controller{

    private $_contenedor;

    function __construct(){
        parent::__construct();
        $this->_contenedor = new Contenedor;
        View::set('header',$this->_contenedor->header());
        View::set('footer',$this->_contenedor->footer());
    }

    public function index() {
        $search = $_POST['search'];
        $datos_user = GeneralDao::getAllAsistentesGafete($search);
        if($search){
            if($datos_user<1){
                echo '<script>alert("ESTE USUARIO NO TIENE ACCESO A CONSTANCIA")</script>';
            }else{
                $this->abrirConstancia($search);
            }
        }

        View::render("asistentes_all"); 
    }

    public function Usuario() {
        $search = $_POST['search'];
        $datos_user = GeneralDao::getAllAsistentesGafete($search);
        if($search){
            if($datos_user<1){
                echo '<script>alert("ESTE USUARIO NO TIENE ACCESO A CONSTANCIA")</script>';
            }else{
                $total_usuarios = GeneralDao::groupById($search);
                $array = sizeof($total_usuarios);
                if($array > 1){
                    echo '<script>alert("Se ha encontrado más usuarios, intente de nuevo")</script>';
                    $tabla_usuarios = '';
                    foreach($total_usuarios as $key => $value){
                        $tabla_usuarios .= <<<html
                        <tr>
                            <td>{$value['nombre_completo']}</td>
                            <td><button value="{$value['nombre_completo']}" class="add_nombre btn btn-success" id="add_nombre">AGREGAR</button></td>
                        </tr>
html;
                    }
                    $tabla_completa = '';
                    $tabla_completa .= <<<html
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <h5 class"text-center">Busque el nombre que le corresponda a usted, agreguelo en el campo de arriba
                            o presione el botón de AGREGAR del campo que corresponde.</h5>
                            <table class="table align-items-center mb-0 table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre de Autor</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Agregar</th>                               
                                    </tr>
                                </thead>
                                <tbody>
                                    {$tabla_usuarios}
                                </tbody>
                            </table>
                        </div>
                    </div>
html;                    
                }else{
                    $this->abrirConstancia($search);
                }
            }
        }

        View::set("tabla_usuarios",$tabla_usuarios);
        View::set("tabla_completa",$tabla_completa);
        View::render("asistentes_all");
    }

    public function abrirConstancia($value)
    {

        $datos_user = GeneralDao::getAllAsistentesGafete($value);
        $idd = $datos_user['user_id'];

        // echo $nombre_completo;
        // exit;
        // INSERTAR CONSTANCIAS DESCARGADAS
        // $buscar_constancia =GeneralDao::getAllConstanciasRegistradas($idd);
        // if($buscar_constancia){
        //     $actualiza_constancia =GeneralDao::updateConstanciaStatus($idd);
            
        // }else{
        //     $insert_impresion_constancia = GeneralDao::insertImpresionConstancia($datos_user['user_id'],'Digital');
        // }

        $pdf = new \FPDF($orientation = 'L', $unit = 'mm', $format = 'A4');

        foreach($datos_user as $value){
        $title = html_entity_decode($value['nombre_titulo']);
        $nombre = html_entity_decode($value['nombre']);
        $apellido = html_entity_decode($value['apellido_p']);
        $segundo_apellido = html_entity_decode($value['apellido_m']);
        $nombre_completo = ($value['prefijo'])."".($nombre)." ".($apellido)." ".($segundo_apellido);
        $nombre_completo = mb_strtoupper($nombre_completo);
        $titulo = mb_strtoupper($title);

        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 8);    //Letra Arial, negrita (Bold), tam. 20
        $pdf->setY(1);
        $pdf->Image('constancias/plantillas/constancia.jpeg', 0, 0, 298, 210);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetFont('Arial', 'B', 5);    //Letra Arial, negrita (Bold), tam. 20
        $pdf->SetXY(55, 88);
        
        $pdf->SetFont('Arial', 'B', 24);
        #4D9A9B
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Multicell(190, 30, utf8_decode($nombre_completo), 0, 'C');

        $pdf->SetXY(82.5, 121);
        $pdf->SetFont('Times', 'I', 12);
        $pdf->Multicell(132, 3.5, utf8_decode($titulo), 0, 'C');
        }

        $pdf->Output('D','constancia.pdf'); 
    }

    public function generateRandomString($length = 6){
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    public function generaterQr($clave_ticket){

        $codigo_rand = $clave_ticket;

        $config = array(
            'ecc' => 'H',    // L-smallest, M, Q, H-best
            'size' => 11,    // 1-50
            'dest_file' => '../public/qrs/' . $codigo_rand . '.png',
            'quality' => 90,
            'logo' => 'logo.jpg',
            'logo_size' => 100,
            'logo_outline_size' => 20,
            'logo_outline_color' => '#FFFF00',
            'logo_radius' => 15,
            'logo_opacity' => 100,
        );

        // Contenido del código QR
        $data = $codigo_rand;

        // Crea una clase de código QR
        $oPHPQRCode = new PHPQRCode();

        // establecer configuración
        $oPHPQRCode->set_config($config);

        // Crea un código QR
        $qrcode = $oPHPQRCode->generate($data);

        //   $url = explode('/', $qrcode );
    }

}

class PHPQRCode
{ // class start

    /** Configuración predeterminada */
    private $_config = array(
        'ecc' => 'H',                       // Calidad del código QR L-menor, M, Q, H-mejor
        'size' => 15,                       // Tamaño del código QR 1-50
        'dest_file' => '',        // Ruta de código QR creada
        'quality' => 100,                    // Calidad de imagen
        'logo' => '',                       // Ruta del logotipo, vacío significa que no hay logotipo
        'logo_size' => null,                // tamaño del logotipo, nulo significa que se calcula automáticamente de acuerdo con el tamaño del código QR
        'logo_outline_size' => null,        // Tamaño del trazo del logotipo, nulo significa que se calculará automáticamente de acuerdo con el tamaño del logotipo
        'logo_outline_color' => '#FFFFFF',  // color del trazo del logo
        'logo_opacity' => 100,              // opacidad del logo 0-100
        'logo_radius' => 0,                 // ángulo de empalme del logo 0-30
    );

    public function set_config($config)
    {

        // Permitir configurar la configuración
        $config_keys = array_keys($this->_config);

        // Obtenga la configuración entrante y escriba la configuración
        foreach ($config_keys as $k => $v) {
            if (isset($config[$v])) {
                $this->_config[$v] = $config[$v];
            }
        }
    }

    /**
     * Crea un código QR
     * @param    Contenido del código QR String $ data
     * @return String
     */
    public function generate($data)
    {

        // Crea una imagen de código QR temporal
        $tmp_qrcode_file = $this->create_qrcode($data);

        // Combinar la imagen del código QR temporal y la imagen del logotipo
        $this->add_logo($tmp_qrcode_file);

        // Eliminar la imagen del código QR temporal
        if ($tmp_qrcode_file != '' && file_exists($tmp_qrcode_file)) {
            unlink($tmp_qrcode_file);
        }

        return file_exists($this->_config['dest_file']) ? $this->_config['dest_file'] : '';
    }

    /**
     * Crea una imagen de código QR temporal
     * @param    Contenido del código QR String $ data
     * @return String
     */
    private function create_qrcode($data)
    {

        // Imagen de código QR temporal
        $tmp_qrcode_file = dirname(__FILE__) . '/tmp_qrcode_' . time() . mt_rand(100, 999) . '.png';

        // Crea un código QR temporal
        \QRcode::png($data, $tmp_qrcode_file, $this->_config['ecc'], $this->_config['size'], 2);

        // Regresar a la ruta temporal del código QR
        return file_exists($tmp_qrcode_file) ? $tmp_qrcode_file : '';
    }

    /**
     * Combinar imágenes de códigos QR temporales e imágenes de logotipos
     * @param  String $ tmp_qrcode_file Imagen de código QR temporal
     */
    private function add_logo($tmp_qrcode_file)
    {

        // Crear carpeta de destino
        $this->create_dirs(dirname($this->_config['dest_file']));

        // Obtener el tipo de imagen de destino
        $dest_ext = $this->get_file_ext($this->_config['dest_file']);

        // Necesito agregar logo
        if (file_exists($this->_config['logo'])) {

            // Crear objeto de imagen de código QR temporal
            $tmp_qrcode_img = imagecreatefrompng($tmp_qrcode_file);

            // Obtener el tamaño de la imagen del código QR temporal
            list($qrcode_w, $qrcode_h, $qrcode_type) = getimagesize($tmp_qrcode_file);

            // Obtener el tamaño y el tipo de la imagen del logotipo
            list($logo_w, $logo_h, $logo_type) = getimagesize($this->_config['logo']);

            // Crea un objeto de imagen de logo
            switch ($logo_type) {
                case 1:
                    $logo_img = imagecreatefromgif($this->_config['logo']);
                    break;
                case 2:
                    $logo_img = imagecreatefromjpeg($this->_config['logo']);
                    break;
                case 3:
                    $logo_img = imagecreatefrompng($this->_config['logo']);
                    break;
                default:
                    return '';
            }

            // Establezca el tamaño combinado de la imagen del logotipo, si no se establece, se calculará automáticamente de acuerdo con la proporción
            $new_logo_w = isset($this->_config['logo_size']) ? $this->_config['logo_size'] : (int)($qrcode_w / 5);
            $new_logo_h = isset($this->_config['logo_size']) ? $this->_config['logo_size'] : (int)($qrcode_h / 5);

            // Ajusta la imagen del logo según el tamaño establecido
            $new_logo_img = imagecreatetruecolor($new_logo_w, $new_logo_h);
            imagecopyresampled($new_logo_img, $logo_img, 0, 0, 0, 0, $new_logo_w, $new_logo_h, $logo_w, $logo_h);

            // Determinar si se necesita un golpe
            if (!isset($this->_config['logo_outline_size']) || $this->_config['logo_outline_size'] > 0) {
                list($new_logo_img, $new_logo_w, $new_logo_h) = $this->image_outline($new_logo_img);
            }

            // Determine si se necesitan esquinas redondeadas
            if ($this->_config['logo_radius'] > 0) {
                $new_logo_img = $this->image_fillet($new_logo_img);
            }

            // Combinar logotipo y código QR temporal
            $pos_x = ($qrcode_w - $new_logo_w) / 2;
            $pos_y = ($qrcode_h - $new_logo_h) / 2;

            imagealphablending($tmp_qrcode_img, true);

            // Combinar las imágenes y mantener su transparencia
            $dest_img = $this->imagecopymerge_alpha($tmp_qrcode_img, $new_logo_img, $pos_x, $pos_y, 0, 0, $new_logo_w, $new_logo_h, $this->_config['logo_opacity']);

            // Generar imagen
            switch ($dest_ext) {
                case 1:
                    imagegif($dest_img, $this->_config['dest_file'], $this->_config['quality']);
                    break;
                case 2:
                    imagejpeg($dest_img, $this->_config['dest_file'], $this->_config['quality']);
                    break;
                case 3:
                    imagepng($dest_img, $this->_config['dest_file'], (int)(($this->_config['quality'] - 1) / 10));
                    break;
            }

            // No es necesario agregar logo
        } else {

            $dest_img = imagecreatefrompng($tmp_qrcode_file);

            // Generar imagen
            switch ($dest_ext) {
                case 1:
                    imagegif($dest_img, $this->_config['dest_file'], $this->_config['quality']);
                    break;
                case 2:
                    imagejpeg($dest_img, $this->_config['dest_file'], $this->_config['quality']);
                    break;
                case 3:
                    imagepng($dest_img, $this->_config['dest_file'], (int)(($this->_config['quality'] - 1) / 10));
                    break;
            }
        }
    }

    /**
     * Acaricia el objeto de la imagen
     * @param    Objeto de imagen Obj $ img
     * @return Array
     */
    private function image_outline($img)
    {

        // Obtener ancho y alto de la imagen
        $img_w = imagesx($img);
        $img_h = imagesy($img);

        // Calcula el tamaño del trazo, si no está configurado, se calculará automáticamente de acuerdo con la proporción
        $bg_w = isset($this->_config['logo_outline_size']) ? intval($img_w + $this->_config['logo_outline_size']) : $img_w + (int)($img_w / 5);
        $bg_h = isset($this->_config['logo_outline_size']) ? intval($img_h + $this->_config['logo_outline_size']) : $img_h + (int)($img_h / 5);

        // Crea un objeto de mapa base
        $bg_img = imagecreatetruecolor($bg_w, $bg_h);

        // Establecer el color del mapa base
        $rgb = $this->hex2rgb($this->_config['logo_outline_color']);
        $bgcolor = imagecolorallocate($bg_img, $rgb['r'], $rgb['g'], $rgb['b']);

        // Rellena el color del mapa base
        imagefill($bg_img, 0, 0, $bgcolor);

        // Combina la imagen y el mapa base para lograr el efecto de trazo
        imagecopy($bg_img, $img, (int)(($bg_w - $img_w) / 2), (int)(($bg_h - $img_h) / 2), 0, 0, $img_w, $img_h);

        $img = $bg_img;

        return array($img, $bg_w, $bg_h);
    }


    private function image_fillet($img)
    {

        // Obtener ancho y alto de la imagen
        $img_w = imagesx($img);
        $img_h = imagesy($img);

        // Crea un objeto de imagen con esquinas redondeadas
        $new_img = imagecreatetruecolor($img_w, $img_h);

        // guarda el canal transparente
        imagesavealpha($new_img, true);

        // Rellena la imagen con esquinas redondeadas
        $bg = imagecolorallocatealpha($new_img, 255, 255, 255, 127);
        imagefill($new_img, 0, 0, $bg);

        // Radio de redondeo
        $r = $this->_config['logo_radius'];

        // Realizar procesamiento de esquinas redondeadas
        for ($x = 0; $x < $img_w; $x++) {
            for ($y = 0; $y < $img_h; $y++) {
                $rgb = imagecolorat($img, $x, $y);

                // No en las cuatro esquinas de la imagen, dibuja directamente
                if (($x >= $r && $x <= ($img_w - $r)) || ($y >= $r && $y <= ($img_h - $r))) {
                    imagesetpixel($new_img, $x, $y, $rgb);

                    // En las cuatro esquinas de la imagen, elige dibujar
                } else {
                    // arriba a la izquierda
                    $ox = $r; // centro x coordenada
                    $oy = $r; // centro coordenada y
                    if ((($x - $ox) * ($x - $ox) + ($y - $oy) * ($y - $oy)) <= ($r * $r)) {
                        imagesetpixel($new_img, $x, $y, $rgb);
                    }

                    // parte superior derecha
                    $ox = $img_w - $r; // centro x coordenada
                    $oy = $r;        // centro coordenada y
                    if ((($x - $ox) * ($x - $ox) + ($y - $oy) * ($y - $oy)) <= ($r * $r)) {
                        imagesetpixel($new_img, $x, $y, $rgb);
                    }

                    // abajo a la izquierda
                    $ox = $r;        // centro x coordenada
                    $oy = $img_h - $r; // centro coordenada y
                    if ((($x - $ox) * ($x - $ox) + ($y - $oy) * ($y - $oy)) <= ($r * $r)) {
                        imagesetpixel($new_img, $x, $y, $rgb);
                    }

                    // abajo a la derecha
                    $ox = $img_w - $r; // centro x coordenada
                    $oy = $img_h - $r; // centro coordenada y
                    if ((($x - $ox) * ($x - $ox) + ($y - $oy) * ($y - $oy)) <= ($r * $r)) {
                        imagesetpixel($new_img, $x, $y, $rgb);
                    }
                }
            }
        }

        return $new_img;
    }

    // Combinar las imágenes y mantener su transparencia
    private function imagecopymerge_alpha($dest_img, $src_img, $pos_x, $pos_y, $src_x, $src_y, $src_w, $src_h, $opacity)
    {

        $w = imagesx($src_img);
        $h = imagesy($src_img);

        $tmp_img = imagecreatetruecolor($src_w, $src_h);

        imagecopy($tmp_img, $dest_img, 0, 0, $pos_x, $pos_y, $src_w, $src_h);
        imagecopy($tmp_img, $src_img, 0, 0, $src_x, $src_y, $src_w, $src_h);
        imagecopymerge($dest_img, $tmp_img, $pos_x, $pos_y, $src_x, $src_y, $src_w, $src_h, $opacity);

        return $dest_img;
    }


    private function create_dirs($path)
    {

        if (!is_dir($path)) {
            return mkdir($path, 0777, true);
        }

        return true;
    }


    private function hex2rgb($hexcolor)
    {
        $color = str_replace('#', '', $hexcolor);
        if (strlen($color) > 3) {
            $rgb = array(
                'r' => hexdec(substr($color, 0, 2)),
                'g' => hexdec(substr($color, 2, 2)),
                'b' => hexdec(substr($color, 4, 2))
            );
        } else {
            $r = substr($color, 0, 1) . substr($color, 0, 1);
            $g = substr($color, 1, 1) . substr($color, 1, 1);
            $b = substr($color, 2, 1) . substr($color, 2, 1);
            $rgb = array(
                'r' => hexdec($r),
                'g' => hexdec($g),
                'b' => hexdec($b)
            );
        }
        return $rgb;
    }


    private function get_file_ext($file)
    {
        $filename = basename($file);
        list($name, $ext) = explode('.', $filename);

        $ext_type = 0;

        switch (strtolower($ext)) {
            case 'jpg':
            case 'jpeg':
                $ext_type = 2;
                break;
            case 'gif':
                $ext_type = 1;
                break;
            case 'png':
                $ext_type = 3;
                break;
        }

        return $ext_type;
    }
} // class end
