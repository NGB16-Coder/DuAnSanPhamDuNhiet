<nav class="desktop-menu">
    <ul>
        <li class="active"><a href="<?= BASE_URL?>">trang chủ</a>
        </li>
        <?php foreach ($listCategory as $category) {?>
        <li class="position-static"><a
                href="<?php echo BASE_URL.'?act=san-pham-theo-danh-muc&id='.$category['dm_id'] ?>"><?= $category['ten_dm'] ?></a>
        </li>
        <?php }; ?>
        <!-- <li class="position-static"><a href="#">bình giữ nhiệt</a>
    </li>
    <li><a href="#">cốc giữ nhiệt</a>
    </li> -->
        <li><a href="#">liên hệ</a>
        </li>
        <li><a
                href="<?= BASE_URL.'?act=gioi-thieu'?>">Về
                chúng tôi</a></li>
    </ul>
</nav>