<?php

/* MyAppFilmothequeBundle::index.html.twig */
class __TwigTemplate_31dda07041a7aa539facb3607a63e6b2 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<p> ";
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "!</p>
";
    }

    public function getTemplateName()
    {
        return "MyAppFilmothequeBundle::index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
