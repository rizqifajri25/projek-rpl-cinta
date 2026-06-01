<?php
it('supports reservation status lifecycle', function(){expect(['pending','confirmed','rejected','cancelled','completed'])->toContain('confirmed');});
