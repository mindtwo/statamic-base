---
id: bb39c77b-2afc-4b50-b583-4741458a270a
blueprint: page
title: Home
meta_robots: 'index, follow'
updated_by: 8dd5f143-15b2-4d25-ace3-6e22e009dd5c
updated_at: 1758224977
blocks:
  -
    id: mfodj1kp
    type: hero
    enabled: true
    element: h1
    lazy_loading: true
    heading: 'Lorem ipsum dolor'
    wysiwyg:
      -
        type: paragraph
        attrs:
          textAlign: left
        content:
          -
            type: text
            text: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      -
        type: set
        attrs:
          id: mfpkqax7
          values:
            type: button
            button_link: '#'
            button_label: Button
            style: primary
            button_style: contrast
    image: 862-1536x600.jpg
    spacing_top: none
    spacing_bottom: default
    overline: Overline
  -
    id: mfodiv3q
    type: cards
    enabled: true
    overline: Overline
    heading: Cards
    element: h2
    wysiwyg:
      -
        type: paragraph
        attrs:
          textAlign: left
        content:
          -
            type: text
            text: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
    cards:
      -
        id: mfpkk96l
        heading: 'Card item'
        description: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
        element: h3
        wysiwyg:
          -
            type: paragraph
            content:
              -
                type: text
                text: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
      -
        id: mfpkqqn7
        heading: 'Card item'
        description: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
        element: h3
        wysiwyg:
          -
            type: paragraph
            content:
              -
                type: text
                text: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
      -
        id: mfpkqvqx
        heading: 'Card item'
        description: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
        element: h3
        wysiwyg:
          -
            type: paragraph
            content:
              -
                type: text
                text: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
    spacing_top: default
    spacing_bottom: default
  -
    id: mfpkss1f
    overline: Overline
    heading: 'Text + Image'
    element: h2
    wysiwyg:
      -
        type: paragraph
        attrs:
          textAlign: left
        content:
          -
            type: text
            text: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
      -
        type: set
        attrs:
          id: mfpr0qxv
          values:
            type: button
            button_link: '#'
            button_style: primary
            button_label: Button
    image: 1063-1000x1000.jpg
    reverse_order: true
    center_content_vertically: true
    type: text_image
    enabled: true
    spacing_top: default
    spacing_bottom: default
  -
    id: mfo2fpoc
    element: h1
    wysiwyg:
      -
        type: heading
        attrs:
          textAlign: left
          level: 2
        content:
          -
            type: text
            text: 'Heading h2'
      -
        type: paragraph
        attrs:
          textAlign: left
        content:
          -
            type: text
            text: 'Lorem ipsum dolor sit amet, '
          -
            type: text
            marks:
              -
                type: link
                attrs:
                  href: '#'
                  rel: noopener
                  target: null
                  title: null
            text: 'consetetur sadipscing elitr'
          -
            type: text
            text: ', sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
      -
        type: bulletList
        content:
          -
            type: listItem
            content:
              -
                type: paragraph
                attrs:
                  textAlign: left
                content:
                  -
                    type: text
                    text: 'List item'
          -
            type: listItem
            content:
              -
                type: paragraph
                attrs:
                  textAlign: left
                content:
                  -
                    type: text
                    text: 'List item'
          -
            type: listItem
            content:
              -
                type: paragraph
                attrs:
                  textAlign: left
                content:
                  -
                    type: text
                    text: 'List item'
      -
        type: paragraph
        attrs:
          textAlign: left
        content:
          -
            type: text
            text: 'Lorem ipsum dolor sit amet, '
          -
            type: text
            marks:
              -
                type: bold
            text: 'consetetur sadipscing'
          -
            type: text
            text: ' elitr, sed diam nonumy eirmod tempor'
          -
            type: text
            marks:
              -
                type: italic
            text: ' invidunt ut labore'
          -
            type: text
            text: ' et dolore '
          -
            type: text
            marks:
              -
                type: underline
            text: 'magna aliquyam erat'
          -
            type: text
            text: ', sed diam voluptua.'
      -
        type: heading
        attrs:
          textAlign: left
          level: 3
        content:
          -
            type: text
            text: 'Heading h3'
      -
        type: table
        content:
          -
            type: tableRow
            content:
              -
                type: tableHeader
                attrs:
                  colspan: 1
                  rowspan: 1
                  colwidth: null
                content:
                  -
                    type: paragraph
                    attrs:
                      textAlign: left
                    content:
                      -
                        type: text
                        text: 'Table head'
              -
                type: tableHeader
                attrs:
                  colspan: 1
                  rowspan: 1
                  colwidth: null
                content:
                  -
                    type: paragraph
                    attrs:
                      textAlign: left
                    content:
                      -
                        type: text
                        text: 'Table head'
              -
                type: tableHeader
                attrs:
                  colspan: 1
                  rowspan: 1
                  colwidth: null
                content:
                  -
                    type: paragraph
                    attrs:
                      textAlign: left
                    content:
                      -
                        type: text
                        text: 'Table head'
          -
            type: tableRow
            content:
              -
                type: tableCell
                attrs:
                  colspan: 1
                  rowspan: 1
                  colwidth: null
                content:
                  -
                    type: paragraph
                    attrs:
                      textAlign: left
                    content:
                      -
                        type: text
                        text: 'Table data'
              -
                type: tableCell
                attrs:
                  colspan: 1
                  rowspan: 1
                  colwidth: null
                content:
                  -
                    type: paragraph
                    attrs:
                      textAlign: left
                    content:
                      -
                        type: text
                        text: 'Table data'
              -
                type: tableCell
                attrs:
                  colspan: 1
                  rowspan: 1
                  colwidth: null
                content:
                  -
                    type: paragraph
                    attrs:
                      textAlign: left
                    content:
                      -
                        type: text
                        text: 'Table data'
          -
            type: tableRow
            content:
              -
                type: tableCell
                attrs:
                  colspan: 1
                  rowspan: 1
                  colwidth: null
                content:
                  -
                    type: paragraph
                    attrs:
                      textAlign: left
                    content:
                      -
                        type: text
                        text: 'Table data'
              -
                type: tableCell
                attrs:
                  colspan: 1
                  rowspan: 1
                  colwidth: null
                content:
                  -
                    type: paragraph
                    attrs:
                      textAlign: left
                    content:
                      -
                        type: text
                        text: 'Table data'
              -
                type: tableCell
                attrs:
                  colspan: 1
                  rowspan: 1
                  colwidth: null
                content:
                  -
                    type: paragraph
                    attrs:
                      textAlign: left
                    content:
                      -
                        type: text
                        text: 'Table data'
      -
        type: heading
        attrs:
          textAlign: left
          level: 4
        content:
          -
            type: text
            text: 'Heading h4'
      -
        type: paragraph
        attrs:
          textAlign: left
        content:
          -
            type: text
            text: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
      -
        type: orderedList
        attrs:
          start: 1
        content:
          -
            type: listItem
            content:
              -
                type: paragraph
                attrs:
                  textAlign: left
                content:
                  -
                    type: text
                    text: 'List item'
          -
            type: listItem
            content:
              -
                type: paragraph
                attrs:
                  textAlign: left
                content:
                  -
                    type: text
                    text: 'List item'
          -
            type: listItem
            content:
              -
                type: paragraph
                attrs:
                  textAlign: left
                content:
                  -
                    type: text
                    text: 'List item'
      -
        type: horizontalRule
      -
        type: blockquote
        content:
          -
            type: paragraph
            attrs:
              textAlign: left
            content:
              -
                type: text
                text: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
    type: text
    enabled: true
    spacing_top: default
    spacing_bottom: default
  -
    id: mfpjemdj
    overline: Overline
    heading: Heading
    element: h2
    wysiwyg:
      -
        type: paragraph
        attrs:
          textAlign: left
        content:
          -
            type: text
            text: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
    background_color: '#000'
    type: text
    enabled: true
    spacing_top: default
    spacing_bottom: none
  -
    id: mfpr1vv1
    overline: Overline
    heading: Slider
    element: h2
    wysiwyg:
      -
        type: paragraph
        attrs:
          textAlign: left
        content:
          -
            type: text
            text: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
    slides:
      -
        id: mfpr54qr
        image: 1048-600x600.jpg
        type: image
        enabled: true
      -
        id: mfpr5b4q
        overline: Overline
        heading: Heading
        element: h3
        wysiwyg:
          -
            type: paragraph
            attrs:
              textAlign: left
            content:
              -
                type: text
                text: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
        image: 1063-1000x1000.jpg
        type: text_image
        enabled: true
      -
        id: mfpr5t0k
        image: 268-600x600.jpg
        type: image
        enabled: true
      -
        id: mfpr5zvd
        image: 634-900x600.jpg
        type: image
        enabled: true
      -
        id: mfpr6x53
        image: 862-1536x600.jpg
        type: image
        enabled: true
    spacing_top: default
    spacing_bottom: default
    type: slider
    enabled: true
  -
    id: mfpraop0
    image: 862-1536x600.jpg
    spacing_top: default
    spacing_bottom: none
    type: image
    enabled: true
  -
    id: mfptavug
    element: h2
    accordion:
      -
        id: mfptay61
        element: h3
        heading: Heading
        wysiwyg:
          -
            type: paragraph
            content:
              -
                type: text
                text: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
      -
        id: mfptd3rn
        heading: Heading
        element: h3
        wysiwyg:
          -
            type: paragraph
            content:
              -
                type: text
                text: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
    type: accordion
    enabled: true
    heading: Accordion
    wysiwyg:
      -
        type: paragraph
        attrs:
          textAlign: left
        content:
          -
            type: text
            text: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
    spacing_top: default
    spacing_bottom: default
  -
    id: mfpr20de
    heading: 'Call to Action'
    element: h2
    wysiwyg:
      -
        type: paragraph
        attrs:
          textAlign: left
        content:
          -
            type: text
            text: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
    button_link: '#'
    button_style: contrast
    button_label: Button
    spacing_top: none
    spacing_bottom: default
    type: call_to_action
    enabled: true
  -
    id: mfpr2430
    overline: Overline
    heading: Form
    element: h2
    form: contact
    type: form
    enabled: true
    spacing_top: default
    spacing_bottom: default
---
