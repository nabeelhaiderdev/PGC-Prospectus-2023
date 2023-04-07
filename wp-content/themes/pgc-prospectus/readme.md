# === PGC Prospectus 2023 Package ===

## Contributors: Abu Bakar

Tags: custom-menu, full-width-template, theme-options, translation-ready
Requires at least: 5.8
Tested up to: 5.8
Stable tag: 1.0.0

A PGC Prospectus 2023 Package WordPress theme

## Description

This is a PGC Prospectus 2023 Package WordPress theme

## Instruction

-   **html_entity_decode()** Function is used to decode the escaped html
-   **html_entity_remove()** Function is used to remove the escaped html
-   You Donot need to use isset check condition<br>
    **$pgcpp_page_pagetitle = (isset($fields['pgcpp_pagetitle'])) ? $fields['pgcpp_pagetitle'] : null;**
-   Not needed Use<br>
    **$pgcpp_page_pagetitle = $fields['pgcpp_pagetitle'];**
-   CTA is moved in footer
-   page-section section now close in the file it starts.
-   use the condition bellow to get page title it will take the acf field name as input if field is null it will return page title<br>
    **$pgcpp_pagetitle=glide_page_title('pgcpp_pagetitle');**
-   Move sw.js from pwa folder to parent public folder when doing setup
