<?php
/**
 * navigation-left.php
 *
 * @author Pedro Plowman
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @link https://github.com/p2made
 * @package p2made/yii2-sb-admin-theme
 * @license MIT
 */

use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

use p2m\widgets\MetisNav;
use p2m\helpers\FA;

$arrowIcon = FA::i('arrow')->tag('span');
?>
<section class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<li class="sidebar-search">
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">
							<i class="fa fa-search"></i>
						</button>
					</span>
				</div>
			</li>
			<li><?= Html::a(
				FA::fw('dashboard') . ' Dashboard',
				Yii::$app->homeUrl
			) ?></li><!-- Dashboard -->
            <li>
                <a href="#"><?= FA::fw('files-o') ?> Bahagian<?= $arrowIcon ?></a>
                <?= MetisNav::widget([
                    'encodeLabels' => false,
                    'options' => ['class' => 'nav nav-second-level'],
                    'items' => [
                        ['label' => 'Senarai Bahagian', 'url' => ['/bahagian/index', 'view' => 'List Bahagian']],
                        ['label' => 'Tambah Bahagian', 'url' => ['/bahagian/create', 'view' => 'List Bahagian']],

                    ],
                ]) ?>
            </li><!-- Sample Pages -->
			<li>
				<a href="#"><?= FA::fw('coffee') ?> Developer<?= $arrowIcon ?></a>
				<?= MetisNav::widget([
					'encodeLabels' => false,
					'options' => ['class' => 'nav nav-second-level'],
					'items' => [
						['label' => '<span class="fa fa-file-code-o fa-fw"></span> Gii', 'url' => ['/gii']],
						['label' => '<span class="fa fa-dashboard fa-fw"></span> Debug', 'url' => ['/debug']],
					],
				]) ?>
			</li><!-- Developer -->
		</ul>
	</div>
</section>
