# WP Pre Theme

## Usage of wp pre theme

- Install Node Dependices

<code>npm run start</code>

- to generate your theme.

<code> npm run build </code>

- to clean unused files, render styles, scripts and copy files.

<code> gulp dev </code>

- to clean unused files, render styles, scripts and copy files, and open liveserver and watch changes.

<code> gulp bundle </code>

- run build command and compress used files in new folder.

### Custom Hooks

- \_themename_after_pagination
- \_themename_before_header
- \_themename_after_header
- \_themename_before_footer
- \_themename_after_footer
- \_themename_single_post_before_header
- \_themename_single_post_after_header
- \_themename_single_post_before_footer
- \_themename_single_post_after_footer
- \_themename_before_author_header
- \_themename_after_author_header
- \_themename_before_author_footer
- \_themename_after_author_footer
- \_themename_page_before_header
- \_themename_page_after_header
- \_themename_page_before_footer
- \_themename_page_after_footer
- \_themename_portfolio_tax is used to show taxonomy tags for portfolio

### Shortcode

- [\_themename_icon_button color="#f03" text="Read More" icon="your icon name"][/_themename_icon_button]

### For Loop

- Create loop.php in child theme to override default loop.
- Create loop-index.php and loop-archive.php to override loop separately.
