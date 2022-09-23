<div class="row">
    <div class="col-md-6 offset-md-3">
        <?= $this->Flash->render() ?>
        <div class="card">
            <div class="card-header">
                <h3>สมัครสมาชิก</h3>
                <div class="card-body">
                    <?= $this->form->create() ?>
                    <?php echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));
 ?>
                    <div class="form-group">
                        <?= $this->Form->control('name');; ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('email');; ?>
                    </div>
                    <div class="form-group">
                    <?= $this->Form->control('password');; ?>
                    </div>
                    <?=
                    $this->form->button('สมัครสมาชิก', ['class' => 'btn btn-primary']);

                    $this->form->end();
                    ?>
                </div>
            </div>

        </div>

    </div>
</div>