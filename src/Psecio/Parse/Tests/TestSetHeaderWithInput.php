<?php

namespace Psecio\Parse\Tests;

/**
 * Ensure that header() calls don't use concatenation directly
 */
class TestSetHeaderWithInput extends \Psecio\Parse\Test
{
	public function evaluate($node, $file = null)
	{
		if ($node->isFunction('header') === true) {
			if ($node->args[0]->value instanceof \PhpParser\Node\Expr\BinaryOp\Concat) {
				return false;
			}
		}
		return true;
	}
}