<?php

namespace SSNepenthe\RecipeParser\Parsers;

/**
 * @todo Has multiple images we can grab if we want.
 *       Verify consistency of .recipePartRecipeImage across multiple recipes.
 *       No great way to select prep and cook times - need to revisit.
 *       They seem to have notes/tips - see breakfast link below.
 *
 * @link http://www.tablespoon.com/recipes/copycat-in-n-out-burger-double-cheeseburger/ea7f1d77-0fbf-448d-acc4-597d8f8fccec#
 * @link http://www.tablespoon.com/recipes/do-ahead-breakfast-bake-recipe/2/
 */
class TablespoonCom extends SchemaOrg
{
    protected function configure()
    {
        parent::configure();

        $this->config['author']['locations'] = ['nodeValue'];
        $this->config['image']['selector'] = '.recipePartRecipeImage img';
        $this->config['recipeIngredients']['selector'] = '[itemprop="ingredients"]';
        $this->config['url']['selector'] = 'link[rel="canonical"]';
    }
}
