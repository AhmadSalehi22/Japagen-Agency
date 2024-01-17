<main class="form-login">
  <?= form_open('user/login') ?>
  <?= csrf_field() ?>
  <div class="containter mt-4">
    <div class="row justify-content-center">
      <div class="col-md-3">
        <div class="card text-center">
          <div class="card-header">
            <h5>
              Login
            </h5>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-12 mt-2">
                <label class="mb-1">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Your Email">
              </div>
            </div>
            <div class="form-group col-md-12 mt-2">
              <label class="mb-1">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password">
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
              <button type="submit" class="btn btn-primary mt-3">Sign In</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </form>