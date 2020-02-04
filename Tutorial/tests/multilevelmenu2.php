<?php
$con=mysqli_connect("localhost","root","","test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// Select all entries from the menu table
$result=mysqli_query($con,"SELECT menu_id, menu_name, link, parent_id FROM menu ORDER BY parent_id, menu_name");
// Create a multidimensional array to conatin a list of items and parents
$menu = array(
    'items' => array(),
    'parents' => array()
);
// Builds the array lists with data from the menu table
while ($items = mysqli_fetch_assoc($result)) {
    // Creates entry into items array with current menu item id ie. $menu['items'][1]
    $menu['items'][$items['menu_id']] = $items;
    // Creates entry into parents array. Parents array contains a list of all items with children
    $menu['parents'][$items['parent_id']][] = $items['menu_id'];
}
// Menu builder function, parentId 0 is the root
function buildMenu($parent, $menu) {
   $html = "";
   if (isset($menu['parents'][$parent])) {
      $html .= "
      <ul>\n";
       foreach ($menu['parents'][$parent] as $itemId) {
          if(!isset($menu['parents'][$itemId])) {
             $html .= "<li>\n  <a href='".$menu['items'][$itemId]['link']."'>".$menu['items'][$itemId]['menu_name']."</a>\n</li> \n";
          }
          if(isset($menu['parents'][$itemId])) {
             $html .= "
             <li>\n  <a href='".$menu['items'][$itemId]['link']."'>".$menu['items'][$itemId]['menu_name']."</a> \n";
             $html .= buildMenu($itemId, $menu);
             $html .= "</li> \n";
          }
       }
       $html .= "</ul> \n";
   }
   return $html;
}
?>
<div class="menu">
   <?php echo buildMenu(0, $menu); ?>
</div>