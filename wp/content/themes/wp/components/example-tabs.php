<!--
*
* Tabs - Bootstrap
*
-->
<!-- Nav tabs -->
<div class="qwp-tabs">
  <ul class="qwp-tabs__header nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="qwp-tabs__body tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">
      <!--
      *
      * Tabela
      *
      -->
      <h4>Home</h4>

      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th class="text-center">Coluna 1</th>
            <th class="text-center">Coluna 2</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <tr>
            <td>1</td>
            <td>Ligula Ullamcorper</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Cursus Inceptos</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Fringilla Porta</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="profile">
      <h4>Profile</h4>
      Nulla vitae elit libero, a pharetra augue. Vestibulum id ligula porta felis euismod semper.
    </div>
    <div role="tabpanel" class="tab-pane fade" id="messages">
      <h4>Messages</h4>
      Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
    </div>
    <div role="tabpanel" class="tab-pane fade" id="settings">
      <h4>Settings</h4>
      Donec ullamcorper nulla non metus auctor fringilla. Maecenas faucibus mollis interdum.
    </div>
  </div>
</div><!-- /.qwp-tabs -->