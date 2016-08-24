<?php

namespace Highlander\Http\Requests;

use Highlander\Http\Requests\Request;

class CarRequest extends Request
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'brands_id'             => 'required|string',
      'title'                 => 'required|string',
      'name'                  => 'required|string',
      'thumbnail'             => 'required|string',
      'price'                 => 'required|string',
      'description'           => 'required|string',
      'slug'                  => 'required|string',
      'Capacidad'             => 'required|string',
      'Potencia'              => 'required|string',
      'Cilindros'             => 'required|string',
      'Valvulas'              => 'required|string',
      'Frenos[]'              => 'string',
      'Rines[]'               => 'string',
      'UrlMotor'              => 'required|string',
      'UrlAuto'               => 'required|string',
      'Faros[]'               => 'string',
      'SeguridadExterior[]'   => 'string',
      'Cristales[]'           => 'string',
      'EspejosLaterales[]'    => 'string',
      'Techo[]'               => 'string',
      'UrlInterior'           => 'required|string',
      'AcabadosInteriores[]'  => 'string',
      'Asientos[]'            => 'string',
      'SistemaAudio[]'        => 'string',
      'Confort[]'             => 'string',
      'CinturonesSeguridad[]' => 'string',
      'SeguridadInterior[]'   => 'string',
      'Download'              => 'required|string'
    ];
  }
}
