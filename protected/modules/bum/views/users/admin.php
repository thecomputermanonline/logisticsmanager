<?php
/**
 * Manage all users view file.
 *
 * @copyright	Copyright &copy; 2012 Hardalau Claudiu 
 * @package		bum
 * @license		New BSD License 
 *  
 * Menu links are displayed only if the user has the right to see those pages.
 */

/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>(Yii::app()->user->checkAccess("users_admin")?array('admin'):""),
	'Manage',
);

$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($this->module->assetsUrl . '/js/invitations.js');

/* Send an invitation dialog box */
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'Invite',
    'options'=>array(
        'autoOpen'=>false,
        'modal'=>true,
    )
));
    ?><DIV id="dlg_history_content"></DIV><?php
    ?><DIV id="dlg_invite_content"></DIV><?php
    ?><div id="AjaxLoader" style="display: none; margin: 0 auto; text-align: center;"><IMG src="<?php echo $this->module->assetsUrl; ?>/images/spinner.gif" width="60px" height="60px" /></div><?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<h1>Manage Users</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p><?php 

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('users-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); 
?><div class="search-form" style="display:none"><?php 
$this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form --><?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    //'afterAjaxUpdate' => 'function(){}',
	'columns'=>array(
		'id', // error postgre thinks that id is a string... something must be done..
		'user_name',
        array(
            'name'=>'email',
            'value'=>'(((Yii::app()->user->id === $data->id) || Yii::app()->user->checkAccess("emails_all_view"))?"$data->email":"***")',
        ),
		//'pass',
		//'salt',
        array(
            'name'=>'active',
            'value'=>'$data->getActiveText()',
            'filter' => Users::getActiveOptions(),
        ),
        array(
            'name'=>'status',
            'value'=>'$data->getStatusText()',
            'filter' => Users::getStatusOptions(),
        ),
		'name',
		'surname',
		array(
            'name'=>'date_of_last_access',
            'filter'=>'',
        ),
		//array(
        //    'name'=>'date_of_password_last_change',
        //    'filter'=>'',
        //),
		array(
            'name'=>'date_of_creation',
            'filter'=>'',
        ),
        array(
            'name'=>'social_login',
            'type'=>'raw',
            'filter'=>'',
            'value'=>'
                ((is_array($data->social_login) && in_array(Users::SOCIAL_FACEBOOK, $data->social_login))?CHtml::image(Yii::app()->getModule("bum")->assetsUrl . "/images/facebook_small.gif","f",array("title"=>"facebook logIn is enabled", "style"=>"width:11px;height:11px;")):"") . " " .
                ((is_array($data->social_login) && in_array(Users::SOCIAL_TWITTER, $data->social_login))?CHtml::image(Yii::app()->getModule("bum")->assetsUrl . "/images/twitter_small.gif","t",array("title"=>"twitter logIn is enabled", "style"=>"width:11px;height:11px;")):"")
            ',
 
        ),//*/
		array(
			'class'=>'CButtonColumn',
            'viewButtonUrl'=>'$this->grid->controller->createUrl("users/viewProfile", array("id" => $data["id"]))',
		),
	),
)); ?>
