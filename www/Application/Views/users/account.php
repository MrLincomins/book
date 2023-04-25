<?php require "Application/Views/layout/header.php"; ?>
    <div class="container-fluid">
        <div class="row gx-5">
            <div class="col">
                <div class="card-style settings-card-1 mb-30">
                    <div
                            class="
                    title
                    mb-30
                    d-flex
                    justify-content-between
                    align-items-center
                  "
                    >
                        <h6>Профиль</h6>
                        <button class="border-0 bg-transparent">
                            <span class="mdi mdi-account"></span>
                        </button>
                    </div>
                    <div class="profile-info ">
                        <div class="d-flex align-items-center mb-30">
                            <div class="image">
                                <img src="assets/images/profile/anonimus.jpg" alt="" height="250" width="250"/>
                            </div>
                            <div class="profile-meta">
                                <h5 class="text-bold text-dark mb-10"><?php echo $user[0]['name']; ?></h5>
                                <p class="text-sm text-gray">Крутышка</p>
                            </div>
                        </div>
                        <div class="input-style-1">
                            <label>Класс: <big> <?php echo $user[0]['class'] ?> </big></label>
                        </div>
                        <div class="input-style-1">
                            <label>Классный руководитель: <big> Бикинина Венера Ильдусовна </big></label>
                        </div>
                        <div class="input-style-1">
                            <label>Пароль</label>
                            <input type="password" value="<?php echo $user[0]['password'] ?>"/>
                        </div>
                        <div class="input-style-1">
                            <label>О себе</label>
                            <textarea placeholder="Write your bio here" rows="4">Долго делал этот сайт потратив 999 лет. Нейросети тогда были не такие раскаченные, когда я делал этот проект, так что от них помощи я не получал. По git-у видно, что я начал делать этот проект полностью с нуля. Я не дизайнер xd
                    </textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="main-btn primary-btn btn-hover">
                            Update Profile
                        </button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-style settings-card-1 mb-10">
                    <img src="assets/images/profile/stick.jpg" alt="" width="600" height="818"/>
                    <span class="position-absolute top-0 start-2 translate-middle badge rounded-pill bg-danger">Kandinsky 2.1</span>
                </div>
            </div>
        </div>
    </div>
<?php require "Application/Views/layout/footer.php"; ?>