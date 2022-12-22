<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
	<i class="la la-close"></i>
</button>

<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  " aria-haspopup="true">
                <a href="dashboard" class="m-menu__link">
                	<i class="m-menu__link-icon fa fa-layer-group"></i>
                	<span class="m-menu__link-title"><span class="m-menu__link-wrap">
                	<span class="m-menu__link-text">Dashboard</span></span></span>
                </a>
            </li>
           	
            <?php  
              $uri = current_url(true);
              $cur_uri = (string) $uri; 
              $m_name = $uri->getSegment(3);
             // print'<pre>';print_r($m_name);exit();
              $model_res = model('DashboardModel'); 
             
              $menus = $model_res->get_all_menus();
              $abc = '';
            ?>
        
            <?php foreach($menus as $val) {
                  $menuid = $val['id'];
                  
                  $submenus = $model_res->getSubmenusByMenuid($menuid);  
            ?>
            
		        <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover" id="<?php echo $menuid ?>">
              <a href="" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon <?php echo $val['icon']?>"></i>
                <span class="m-menu__link-text">
                  <?php echo $val['menu_name'];?>
                </span><i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
              
                  <?php 
                   foreach($submenus as $val1) {
                      $subid = $val1['id'];
                      $m_name = '/'.$m_name;
                       
                      if($m_name == $val1['url']){
                        $color = "color:#ebedf2";
                      }else{
                        $color = '';
                      }

                    ?>
                    <li class="m-menu__item sub" data-id='<?php echo $menuid."@@".$val1['id'] ?>' id="submenu_<?php echo $val1['id']?>"  aria-haspopup="true">
                    <a href="<?php echo base_url();?><?php echo $val1['url']?>" class="m-menu__link" onclick="">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span>
                      </i>
                      <span class="m-menu__link-text" id="sub" style="<?php echo $color;?>">
                        <?php echo $val1['submenu_name'];?>
                      </span>
                     </a>
                    </li>
                   <?php } ?>
                </ul>
              </div>
            </li>
        	  <?php } ?>
        </ul>
    </div>
</div>
<script>
    
$('.sub').click(function(e){
  var id = $(this).data("id");
  sessionStorage.setItem('menu_id', id);
});

$( document ).ready(function() {
  var menu_ids = sessionStorage.getItem("menu_id");
  if(menu_ids){
    var menu = menu_ids.split("@@");
    $('#'+menu[0]).addClass("m-menu__item--open");
    $('#submenu_'+menu[1]+'> a >span').css('color', '#ebedf2');
    sessionStorage.removeItem("menu_id");
  }
});
</script> 