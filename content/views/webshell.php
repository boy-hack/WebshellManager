  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Webshell</strong> / <small>一句话管理</small></div>
      </div>
    
      <hr>
          <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <a type="button" class="am-btn am-btn-default" href="index.php?action=add"><span class="am-icon-plus"></span> 新增</a>
              <button type="button" class="am-btn am-btn-default" onclick="logact('del')"><span class="am-icon-trash-o"></span> 删除</button>
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-form-group">
            <select data-am-selected="{btnSize: 'sm'}" onchange="selectSort(this);">
              <option>所有类别</option>
              <option value="PHP">PHP</option>
              <option value="ASPX">ASPX</option>
              <option value="ASP">ASP</option>
              <option value="JSP">JSP</option>
            </select>
          </div>
          <script>
          function selectSort(type){
            window.location.href = "index.php?type=" + type.value;
          }
          
          </script>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <form action="" method="GET">
          <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field" name="keyword">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="submit">搜索</button>
          </span>
          </div>
        </form>
        </div>
      </div>
      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form" action="?action=opera" method="POST" id="form_opera">
            <input type="hidden" id="opera_act" name="opera_act" value=""/>
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-title">URL地址</th><th class="table-type">类别</th><th class="table-author am-hide-sm-only">密码</th><th>备注</th><th class="table-date am-hide-sm-only">修改日期</th><th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($logs as $key => $value):?>
              <tr>
                <td><input type="checkbox" name="id[]" value="<?php echo $value["id"]; ?>" /></td>
        <td><?php echo $value["url"]; ?></td>
                <td><?php echo $value["type"]; ?></td>
                <td class="am-hide-sm-only"><?php echo $value["pass"]; ?></td>
        <td class="am-hide-sm-only"><?php echo $value["extra"]; ?></td>
                <td class="am-hide-sm-only"><?php echo(date("Y-m-d",$value["time"])); ?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <a href="index.php?action=file&gid=<?php echo $value["id"]; ?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 文件管理</a>
                      <a class="am-btn am-btn-default am-btn-xs am-text-secondary" href="index.php?action=edit&gid=<?php echo $value["id"]; ?>"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                      <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" href="index.php?action=del&gid=<?php echo $value["id"]; ?>"><span class="am-icon-trash-o" ></span> 删除</a>
                    </div>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
            <div class="am-cf">
              共 <?php echo $lognum; ?> 条记录
              
              <div class="am-fr">
                <?php echo $page_url; ?>
              </div>
            </div>
            <hr />
            <p>注：.....</p>
          </form>
        </div>

      </div>
    </div>

    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </footer>

  </div>
  <!-- content end -->
  </div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>
<script>
function logact(act){
  if(act == 'del' && !confirm('你确定要删除所选文章吗？')){return;}
  $("#opera_act").val(act);
  $("#form_opera").submit();
}
</script>