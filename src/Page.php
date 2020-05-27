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
    protected $title = "PHP Component";

    protected $html = null;
    protected $htmlHead = null;
    protected $htmlBody = null;

    protected function _paramType()
    {
        return parent::_paramType() + [
            'html' => Html::class
        ];
    }

    public function __construct(...$params)
    {
        parent::__construct(...$params);

        // $this->children = [
        //     Variable::from($this->_html())->default(
        //         Html::build(
        //             Variable::from($this->_htmlHead())->default(
        //                 Head::build(
        //                     Title::build(
        //                         Text::write($this->title)
        //                     ),

        //                 )
        //             )->getValue(),
        //             Variable::from($this->_htmlBody())->default()->getValue()
        //         )
        //     )->getValue()
        // ];
    }

    public function construct()
    {
        return Variable::from($this->html)->getValue();
    }

    public function render()
    {
        echo $this->construct();
    }

    use ComponentBuilderTrait;
}
