<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Feeds;

class FeedsController extends Controller
{
    //
    public function index() {
    $feed = Feeds::make('http://rss.cnn.com/rss/edition.rss');
    $data = array(
      'title'     => $feed->get_title(),
      'permalink' => $feed->get_permalink(),
      'items'     => $feed->get_items(),
    );

    return \View::make('feed', $data);
  }
  public function start(){
  	$feed = \Feeds::make('http://rss.cnn.com/rss/edition_space.rss');


    echo $feed->get_title(); //this will get you the title of the rss


    echo '<hr />';


    echo $feed->get_permalink(); //this will get you the link of the rss


    echo '<hr />';


    $items = $feed->get_items(); //grab all items inside the rss


    foreach($items as $item):


        echo $item->get_title(); //get the title of single news


        echo '<br />';


        echo $item->get_permalink(); //get the link of single news


        echo '<br />';


          echo '<br />';
          echo $item->get_content();
         echo '<img src="$item->get_thumbnail()"';





        //retrive the enclosures (extras ex: attached media)






        echo '<hr />';


    endforeach;
  }
}
