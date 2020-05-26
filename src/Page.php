<?php namespace IamAdty\Component;

use IamAdty\Component;
use IamAdty\Component\Html\Body;
use IamAdty\Component\Html\Head;
use IamAdty\Component\Html\Meta;
use IamAdty\Component\Html\Script;
use IamAdty\Component\Html\Style;
use IamAdty\Component\Html\Title;
use IamAdty\Variable;
use IamAdty\Variable\Rule\ToArray;

class Page extends Component
{
    protected $title = "";

    /**
     * @return Html
     */
    protected function _html()
    {
        return Html::build(
            $this->_htmlHead(),
            $this->_htmlBody()
        );
    }

    /**
     * @return Head
     */
    protected function _htmlHead()
    {
        return Head::build(
            Title::build(
                Text::write($this->title)
            ),
            ...Variable::from($this->_htmlHeadMeta())->filter(
                ToArray::create()
            )->getValue(),
            ...Variable::from($this->_htmlHeadStyle())->filter(
                ToArray::create()
            )->getValue()
        );
    }

    /**
     * @return Meta[]
     */
    protected function _htmlHeadMeta()
    {
        return [];
    }

    /**
     * @return Style[]
     */
    protected function _htmlHeadStyle()
    {
        return [];
    }

    /**
     * @return Body
     */
    protected function _htmlBody(...$params)
    {
        return Body::build(
            ...$params,
            ...Variable::from($this->_htmlBodyContentWrapper())->filter(
                ToArray::create()
            )->getValue(),
            ...Variable::from($this->_htmlBodyScript())->filter(
                ToArray::create()
            )->getValue()
        );
    }

    /**
     * @return Script[]
     */
    protected function _htmlBodyScript()
    {
        return [];
    }

    protected function _htmlBodyContentWrapper()
    {
        return null;
    }

    public function construct()
    {
        return $this->_html()->construct();
    }

    public function render()
    {
        echo $this->construct();
    }

    use ComponentBuilderTrait;
}
