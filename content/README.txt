## content/

This directory holds the templates for displaying a post. Typically this will be the full post with title, meta information (date, categories, tags, author, etc.) and the full output of `the_content()`.


## Post Context

When choosing a template to use in the Post Context, the Carrington engine looks information (author, category, tags, custom fields, etc.) related to the post/page being shown.

Commonly these templates are included by templates in the _loop/_; but are also useful for bringing in an atomic post representation via AJAX or placing one within another template.

A "default" template is required, and will be used when there are no other templates that match a given post. This could be because no other templates have been created, or because the post in question doesn't match the templates that are available.

You can create templates to be used with posts/pages given various conditions. For example, you might want to give all posts in a certain category some specific styling rules. Or perhaps posts with a certain custom field or by a specific author. This is accomplished by creating templates with file names that match these conditions, then placing them in the _content/_ directory. All templates other than _{dirname}-default.php_ are optional.

The order in which these conditions are checked defaults to the following:

1. author
2. meta
3. category
4. type
5. role
6. tag
7. parent
8. default

however this order can be overridden with a plugin using the `cfct_single_match_order` hook.

Once a template match has been found, no other processing is done.


### Supported Templates (Post Context)

- *{dirname}-default.php* - Used when there are no other templates that match for a given post/page.
- *author-{username}.php* - Used when a user with that username authors a post/page. For example, a template with a file name of <code>author-jsmith.php</code> would be used for a poat/page by user <code>jsmith</code>. Any WordPres username can take the place of {username} in the file name.
- *cat-{slug}.php* - Used when a post is in a given category. The category is matched by the "slug" - for example a post in category "General" (with a category slug of "general") could use a template of <code>cat-general.php</code>.
- *type-{post_type}.php* - Used when a post belongs to a specific custom post type.  The type is matched by the "post_type" property of the post.  For example if you had a custom post type of <code>news</code>, you could use a template with the name <code>type-news.php</code>.
- *meta-{key}.php* - Used when there is a custom field for the post/page matching the key listed in the file name. This is useful if you want to be able to flag posts as "photo" or similar, and give those posts some custom treatment. In this example, you could add a custom field of "photo" with a value of the URL of the image to a post/page and it would use a template of <code>meta-photo.php</code> if that template exists. The value does not matter in this match.
- *meta-{key}-{value}.php* - Used when there is a custom field for the post/page matching the key and value listed in the file name. This is useful if you want to be able to flag posts as "featured" or similar, and give those posts some custom treatment. In this example, you could add a custom field of "featured" with a value of "yes" to a post/page and it would use a template of <code>meta-featured-yes.php</code> if that template exists.
- *page.php* - Used when the content is being displayed is a page (not a post).
- *parent-{slug}.php* - Used when a page is a child page of a specific parent page. The page is matched by the "slug" - for example a page under a parent page with slug of "example" could use a template of <code>parent-example.php</code>.
- *role-{role}.php* - Used when a post/page is authored by a user with a particular role. The {role} is an all lowercase representation of the role string - for example, an author with an "Administrator" role might use a template of <code>role-administrator.php</code>. This is primarily useful if you have a set of authors that are given a Contributor role; or a Guest Columnist role or similar. Any WordPress role can take the place of {role} in the file name.
- *tag-{slug}.php* - Used when a post has a certain tag applied to it. The tag is matched by the "slug" - for example a post with tag "Reference" (with a tag slug of "reference") could use a template of <code>tag-reference.php</code>.
