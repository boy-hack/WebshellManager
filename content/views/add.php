
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">webshell</strong> / <small>添加</small></div>
      </div>
      
      <hr/>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-8">
          <?php if($_GET["stats"]=="addyes"):?>
          <h2>添加成功</h2>
          <?php endif; ?>
          <form class="am-form am-form-horizontal" action="index.php?action=add&stats=addyes" method="POST">
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">链接 / URL</label>
              <div class="am-u-sm-9">
                <input type="text" name="add_url" placeholder="链接 / URL">
              </div>
            </div>

            <div class="am-form-group">
			<label for="user-email" class="am-u-sm-3 am-form-label">脚本类型 / Type</label>
			<div class="am-u-sm-9">
              <div class="am-btn-group" data-am-button="">
                <label class="am-btn am-btn-default am-btn-xs am-active">
                  <input type="radio" name="options" id="option1" value="ASP"> ASP
                </label>
                <label class="am-btn am-btn-default am-btn-xs">
                  <input type="radio" name="options" id="option2" value="PHP"> PHP
                </label>
                <label class="am-btn am-btn-default am-btn-xs">
                  <input type="radio" name="options" id="option3" value="JSP"> JSP
                </label>
                <label class="am-btn am-btn-default am-btn-xs">
                  <input type="radio" name="options" id="option3" value="ASPX"> ASPX
                </label>
              </div>
            </div>
            </div>

            <div class="am-form-group">
              <label for="user-phone" class="am-u-sm-3 am-form-label">密码 / PassWord</label>
              <div class="am-u-sm-9">
                <input type="text" name="add_password" placeholder="密码 / PassWord">
              </div>
            </div>

            <div class="am-form-group">
              <label for="user-intro" class="am-u-sm-3 am-form-label">备注 / Intro</label>
              <div class="am-u-sm-9">
                <textarea class="" rows="5" name="add_intro" placeholder="输入备注"></textarea>
              </div>
            </div>

            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
                <button type="submit" class="am-btn am-btn-primary">提交</button>
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
