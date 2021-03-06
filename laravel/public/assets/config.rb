# Require any additional compass plugins here.

# Set this to the root of your project when deployed:
http_path = "/"
css_dir = "css"
sass_dir = "sass"
images_dir = "css/img"
javascripts_dir = "js"
fonts_dir = "css/fonts"

#output_style = :expanded
#output_style = :nested
#output_style = :compressed
# or :nested or :compact or :compressed
output_style = :compact
output_style = (environment == :production) ? :compressed : :expanded

#environment = :production
environment = :production

# To enable relative paths to assets via compass helper functions. Uncomment:
relative_assets = true

color_output = false

preferred_syntax = :sass
