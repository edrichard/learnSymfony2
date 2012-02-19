<?php

/* HelloBundle:Default:index.html.twig */
class __TwigTemplate_5c37f0c6a48f403f9f5750eaf5bf1f26 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
<body>
   Hello ";
        // line 3
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "!
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "HelloBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
