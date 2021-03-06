<?php

namespace Toyota\Listeners;

use Toyota\Events\UploadFiles;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UploadFilesListener implements ShouldQueue
{
  use InteractsWithQueue;

  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   *
   * @param  UploadFiles  $event
   * @return void
   */
  public function handle( UploadFiles $event )
  {
    $request          = \Request();
    $listOfFiles      = $event->listOfFiles;
    $files            = $request->files;
    $path             = $event->path;
    $destinationPath  = public_path() . '/' . $path;

    foreach( $listOfFiles as $file )
    {
      if ( $request->hasFile( $file ) )
      {
        try
        {
          $file           = $request->file( $file )
                                    ->store( $destinationPath );
        }
        catch ( Exception $error )
        {
          return $error->getError();
        }
      }
    }
  }
}
