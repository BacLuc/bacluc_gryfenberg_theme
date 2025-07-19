<?php defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Html\Image;
use Concrete\Core\Support\Facade\Application;
use HtmlObject\Image as HtmlImage;

$app = Application::getFacadeApplication();
/**
 * @var string $altText
 */


?>
<?php
$title = h($title);
if ($linkURL) {
    $title = '<a href="' . $linkURL . '">' . $title . '</a>';
}
$iconTag = $iconTag ?? '';

if (is_object($f) && $f->getFileID()) {
    $imageTag = new HtmlImage();

    if ($f->getTypeObject()->isSVG()) {
        $imageTag->setAttribute("src", $f->getRelativePath());

        $imageTag->addClass('ccm-svg');
    } else {
        /** @var Image $image */
        $image = $app->make('html/image', ['f' => $f]);
        $imageTag = $image->getTag();


    }

    $imageTag->addClass('img-fluid bID-' . $bID);
    $imageTag->addClass('card-img-top');

    $altText = $f->getTitle();

    if ($altText) {
        $imageTag->alt(h($altText));
    } else {
        $imageTag->alt('');
    }

    if ($title) {
        $imageTag->title(h($title));
    }

}


?>
<style>
    .bacluc-contact-feature{
        img {
            max-height: 20rem;
            width: auto;
            align-self: center;
        }
    }
</style>
<div class="bacluc-contact-feature border-black mb-3">
    <?php if ($title) { ?>
    <div class="card-header">
        <<?php echo $titleFormat; ?>><?= $title ?></<?php echo $titleFormat; ?>>
    </div>
    <?php }
    if ($iconTag) {?>
        <div style="display: flex; justify-content: center;">
        <?= $imageTag ?>
        </div>
    <?php
    }
    if ($paragraph) {?>
    <div class="card-body">
            <p class="card-text"><?= $paragraph ?></p>

    </div><?php
    } ?>
</div>
