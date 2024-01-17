<main class="user-update">
    <?= form_open('user/update') ?>
    <div class="containter mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card d-flex">
                    <h5 class="card-header">
                        Profile Settings
                    </h5>
                    <div class="card-body d-flex">
                        <div class="row">
                            <div class="col-md-5 border-right">
                                <div class="d-flex flex-column align-items-center text-center"><img
                                        class="rounded-circle mt-5" width="150px"
                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                                        class="font-weight-bold"><?php echo session('user')->name ?></span><span
                                        class="text-black-50"><?php echo session('user')->email ?></span><span>
                                        <a href= "<?= base_url('user/packs'); ?>" class="btn btn-primary btn-danger mt-2">
                                            My Bookings
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <?php
                            $email = session('user')->email;
                            $key = array_search($email, array_column($users, 'email'));
                            $user = $users[$key];
                            ?>
                            <div class="col-md-7 border-right">
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label class="labels mb-1">Name</label>
                                        <input type="input" name="id" class="form-control" hidden value=<?php echo $user->id; ?>>
                                        <input name="name" type="text" class="form-control" placeholder="Full Name"
                                            value="<?php echo htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9 mt-2">
                                        <label class="labels mb-1">Email</label>
                                        <input name="email" type="text" class="form-control" placeholder="Email"
                                            value="<?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="col-md-9 mt-2">
                                        <label class="labels mb-1">Mobile Number</label>
                                        <input name="phone" type="text" class="form-control" placeholder="Phone Number"
                                            value="<?php echo htmlspecialchars($user->phone, ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="col-md-7 mt-2">
                                        <label class="labels mb-1">Date of Birth</label>
                                        <input name="birthday" type="date" class="form-control"
                                            placeholder="Date of Birth"
                                            value="<?php echo htmlspecialchars($user->birthday, ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <label class="labels mb-1">Gender</label>
                                        <select name="gender" class="form-select" id="gender">
                                            <option selected>
                                                <?php echo htmlspecialchars($user->gender, ENT_QUOTES, 'UTF-8'); ?>
                                            </option>
                                            <?php if ($user->gender != 'Male'): ?>
                                                <option value="Male">Male</option>
                                            <?php endif; ?>
                                            <?php if ($user->gender != 'Female'): ?>
                                                <option value="Female">Female</option>
                                            <?php endif; ?>
                                            <?php if ($user->gender != 'Other'): ?>
                                                <option value="Other">Other</option>
                                            <?php endif; ?>
                                            <?php if ($user->gender != 'Rather not say'): ?>
                                                <option value="Rather not say">Rather not say</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="labels my-2">Address</label>
                                    <textarea type="text" name="address"
                                        class="form-control"><?php echo htmlspecialchars($user->address, ENT_QUOTES, 'UTF-8'); ?></textarea>
                                </div>
                                <div class="mt-3 text-center">
                                    <button class="btn btn-primary profile-button" type="submit">
                                        Save Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </form>
