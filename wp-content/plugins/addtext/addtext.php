<?php
/*
Plugin Name: プラグイン練習3
Plugin URI: http://www.example.com/plugin
Description: プラグイン練習3
Author: kensuke goto
Version: 0.1
Author URI: http://www.example.com
*/

function add_text( $contentData ){
    $str = $contentData." <h3>[プラグイン作成3]</h3> " ;
    return $str ;
}
function add_newPosts( $contentData ){
    // 条件定義
    $args = array(
                    'posts_per_page'=>'3',
                    'orderby'       =>'date',//投稿日
                    'order'         =>'DESC'
                );
    $posts = get_posts( $args );
    // リスト表示
    $list = "<div class = 'newPosts'><b>最新の記事</b>";
    $list .= "<ul class= 'mytaglist_ul'>";
    foreach($posts as $post){
        // 更新日のフォーマット変更
        // var_dump(mysql2date('Y','date'));
        $postDate = mysql2date('Y年m月d日','date');
        $list .= "<li><a href='". get_permalink($post->ID)."'>".$post->post_title."(更新日:".$postDate.")</a></li>";
    }
    $list .= "</ul></div>";
    return $contentData.$list;
}
function add_catContents($contentData){
    if(is_single()){
        // 特定のカテゴリID
        $catIDs = array(5,12);
        // 現在のカテゴリIDを取得
        $nowCatID = array();
        foreach (get_the_category() as $cat) {
            array_push($nowCatID,$cat->cat_ID);
        }
        //検索処理
        foreach ($catIDs as $cat->cat_ID){
            if(array_search($catID,$nowCatID)!==false){
                //カテゴリIDが一つでもあった場合の処理
                $str = "例cat_IDが5と12カテゴリでしか表示されないよ<br />";
                $str .= "<img src='http://www.paka3.net/wp-content/uploads/2014/01/wpicon1.png' alt='１日１プラグイン'>";
                return $contentData.$str; //離脱
            }
        }
    }
    //条件にあわない場合はそのまま返す
    return $contentData;
}
add_filter('the_content','add_text');
add_filter('the_content','add_newPosts');
add_filter('the_content','add_catContents');
?>
