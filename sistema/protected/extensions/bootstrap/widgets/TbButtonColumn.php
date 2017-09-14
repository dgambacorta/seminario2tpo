<?php
/**
 *##  TbButtonColumn class file.
 *
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright  Copyright &copy; Christoffer Niska 2011-
 * @license [New BSD License](http://www.opensource.org/licenses/bsd-license.php)
 * @since 0.9.8
 */

Yii::import('zii.widgets.grid.CButtonColumn');

/**
 *## Bootstrap button column widget.
 *
 * Used to set buttons to use Glyphicons instead of the defaults images.
 *
 * @package booster.widgets.grids.columns
 */
class TbButtonColumn extends CButtonColumn
{
	/**
	 * @var string the view button icon (defaults to 'eye-open').
	 */
	public $viewButtonIcon = 'eye-open';

	/**
	 * @var string the update button icon (defaults to 'pencil').
	 */
	public $updateButtonIcon = 'pencil';

	/**
	 * @var string the delete button icon (defaults to 'trash').
	 */
	public $deleteButtonIcon = 'trash';


	public 	$indexButtonIcon = 'icon-zoom-in';

	public 	$evaluacionButtonIcon = 'icon-ok-circle';

	public 	$subsectorButtonIcon = 'icon-plus';

	public 	$subsector2ButtonIcon = 'icon-zoom-in';


	public $updateproyectoButtonIcon = 'pencil';

	/**
	 *### .initDefaultButtons()
	 *
	 * Initializes the default buttons (view, update and delete).
	 */
	protected function initDefaultButtons()
	{
		parent::initDefaultButtons();

		if ($this->viewButtonIcon !== false && !isset($this->buttons['view']['icon'])) {
			$this->buttons['view']['icon'] = $this->viewButtonIcon;
		}
		if ($this->updateButtonIcon !== false && !isset($this->buttons['update']['icon'])) {
			$this->buttons['update']['icon'] = $this->updateButtonIcon;
		}
		if ($this->deleteButtonIcon !== false && !isset($this->buttons['delete']['icon'])) {
			$this->buttons['delete']['icon'] = $this->deleteButtonIcon;
		}

		if ($this->updateproyectoButtonIcon !== false && !isset($this->buttons['updateproyecto']['icon'])) {
			$this->buttons['updateproyecto']['icon'] = $this->updateproyectoButtonIcon;
		}

		if ($this->indexButtonIcon !== false && !isset($this->buttons['conyuge']['icon'])) {
			$this->buttons['conyuge']['icon'] = $this->indexButtonIcon;
		}

		if ($this->subsectorButtonIcon !== false && !isset($this->buttons['subsector']['icon'])) {
			$this->buttons['subsector']['icon'] = $this->subsectorButtonIcon;
		}

			if ($this->subsector2ButtonIcon !== false && !isset($this->buttons['subsector2']['icon'])) {
			$this->buttons['subsector2']['icon'] = $this->subsector2ButtonIcon;
		}


		if ($this->evaluacionButtonIcon !== false && !isset($this->buttons['evaluacion']['icon'])) {
			$this->buttons['evaluacion']['icon'] = $this->evaluacionButtonIcon;
		}
	}

	/**
	 *### .renderButton()
	 *
	 * Renders a link button.
	 *
	 * @param string $id the ID of the button
	 * @param array $button the button configuration which may contain 'label', 'url', 'imageUrl' and 'options' elements.
	 * @param integer $row the row number (zero-based)
	 * @param mixed $data the data object associated with the row
	 */
	protected function renderButton($id, $button, $row, $data)
	{
		if (isset($button['visible']) && !$this->evaluateExpression(
			$button['visible'],
			array('row' => $row, 'data' => $data)
		)
		) {
			return;
		}

		$label = isset($button['label']) ? $button['label'] : $id;
		$url = isset($button['url']) ? $this->evaluateExpression($button['url'], array('data' => $data, 'row' => $row))
			: '#';
		$options = isset($button['options']) ? $button['options'] : array();

		if (!isset($options['title'])) {
			$options['title'] = $label;
		}

		if (!isset($options['rel'])) {
			$options['rel'] = 'tooltip';
		}

		if (isset($button['icon'])) {
			if (strpos($button['icon'], 'icon') === false) {
				$button['icon'] = 'icon-' . implode(' icon-', explode(' ', $button['icon']));
			}

			echo CHtml::link('<i class="' . $button['icon'] . '"></i>', $url, $options);
		} else if (isset($button['imageUrl']) && is_string($button['imageUrl'])) {
			echo CHtml::link(CHtml::image($button['imageUrl'], $label), $url, $options);
		} else {
			echo CHtml::link($label, $url, $options);
		}
	}
}
