# Design Documentation
In this document you’ll find design decisions, rules not expressed in CSS, and some decisions expressed in CSS.

## TOC
- Typographic rhythm

## Typographic rhythm
### Block-Level Elements
All block-level elements have a `margin-block: var(--line-height)` and will set the `margin-block-start` of their first, and the `margin-block-end` of their last child to zero.

### Headings
To ensure typographic rhythm is maintained in layouts with multiple columns, do not use `H1` and `H2` elements inside columns. `H3`, `H4`, `H5` and `H6`-elements may be used within columns. `H1` and `H2` elements will grow in height beyond normal text and break vertical rhythm.