<main class="form-register">
  <?= form_open('user/register') ?>
  <div class="containter mt-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5>
              Register a new user
            </h5>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="mb-1">Full Name</label>
                <input type="input" name="name" class="form-control" placeholder="Your Full Name">
              </div>
              <div class="form-group col-md-6 mt-2">
                <label class="mb-1">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Your Email">
              </div>
            </div>
            <div class="form-group col-md-4 mt-2">
              <label class="mb-1">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password">
              <div id="packNameHelp" class="form-text">at least 8 characters</div>
            </div>
            <div class="form-group col-md-4 mt-2">
              <label class="mb-1">Password Repeat</label>
              <input type="password" name="rep_password" class="form-control" placeholder="Repeat Password">
            </div>
            <span class="error">
              <?= \Config\Services::validation()->listErrors(); ?>
            </span>
            <span class="error">
              <?php if (session()->getFlashdata('msg')): ?>
                <div class="alert alert-danger">
                  <?= session()->getFlashdata('msg') ?>
                </div>
              <?php endif; ?>
            </span>
            <div class="col-md-12 text-center">
              <a href="<?= base_url('pages/view') ?>" class="btn btn-danger mt-2">Back</a>
              <button type="submit" class="btn btn-primary mt-2">Register</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </form>