<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Affiliate;

class AfilliatesUploadController extends Controller
{
  protected $gdo_longitude = -6.2535495;
  protected $gdo_latitude  = 53.3340285;

  public function createForm(){
    return view('upload_files');
  }

  public function fileUpload(Request $req){
        $file = $req->file('file');
        $fp = fopen($file, 'rb');
            while ( ($line = fgets($fp)) !== false) {
                $json =  json_decode( $line );

                $distance = $this->greatCircleDistance( $this->gdo_latitude, $this->gdo_longitude, $json->latitude, $json->longitude );

                Affiliate::firstOrCreate([
                        'affiliate_id' => $json->affiliate_id
                    ],
                    [
                        'affiliate_name'          => $json->name,
                        'affiliate_latitude'      => $json->latitude,
                        'affiliate_longitude'     => $json->longitude,
                        'affiliate_distance'      => $distance
                ]);
            }
            $allrecords = Affiliate::select('affiliate_name','affiliate_id' )
                                        ->where('affiliate_distance' , '<', 100)
                                        ->orderBy('affiliate_id')
                                        ->get();

            return view('upload_files', ['allrecords' => $allrecords]);
   }

   public function greatCircleDistance( $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000 )
        {

            $latFrom = deg2rad($latitudeFrom);
            $lonFrom = deg2rad($longitudeFrom);
            $latTo = deg2rad($latitudeTo);
            $lonTo = deg2rad($longitudeTo);

            $lonDelta = $lonTo - $lonFrom;

            $a = pow(cos($latTo) * sin($lonDelta), 2) +
                 pow(cos($latFrom) * sin($latTo) -
                 sin($latFrom) * cos($latTo) * cos($lonDelta), 2);

            $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

            $angle = atan2(sqrt($a), $b);

            return $angle * $earthRadius/1000;
        }
    }
