
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">webshell</strong> / <small>文件编辑</small></div>
      </div>
      
      <hr/>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-10">
          <form class="am-form am-form-horizontal" action="index.php?action=filedit&gid=<?php echo $info["id"]; ?>&path=<?php echo $path; ?>&stats=addyes" method="POST">
            <div class="am-form-group">
              <label for="user-intro" class="am-u-sm-3 am-form-label">文件路径 / FilePath</label>
              <div class="am-u-sm-9">
                <input type="text" name="path" placeholder="文件路径 / FilePath" value="<?php echo $path; ?>">
              </div>
            </div>

            <div class="am-form-group">
              <label for="user-intro" class="am-u-sm-3 am-form-label">内容 / Content</label>
              <div class="am-u-sm-9">
                <textarea class="" rows="20" name="content" placeholder="输入"><?php echo $content; ?></textarea>
              </div>
            </div>

            <div class="am-form-group">
              <label for="user-phone" class="am-u-sm-3 am-form-label">创建日期 / CreatDate</label>
              <div class="am-u-sm-9">
                <input type="text" name="time" placeholder="创建日期 / CreatDate" value="<?php echo $time; ?>">
              </div>
            </div>

            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
                <button type="submit" class="am-btn am-btn-primary">修改</button>
              </div>
            </div>
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
