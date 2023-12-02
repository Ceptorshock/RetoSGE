//
// Place any custom JS here
//
import { modifierPhases } from '@popperjs/core'
import color-modifierPhases.js

import * as bootstrap from 'bootstrap'

document.querySelectorAll('[data-bs-toggle="popover"]')
  .forEach(popover => {
    new bootstrap.Popover(popover)
  })