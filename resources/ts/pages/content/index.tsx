/** @jsxImportSource @emotion/react */
import React from 'react'
import { Image } from '@mui/icons-material'
import {
    Box,
    Button,
    CardContent,
    Typography,
} from '@mui/material'
import { css } from '@emotion/react'

export const ContentsPage = () => {
    return (
        <div css={container}>
            <Box css={containerBox}>
                <CardContent css={cBContent}>
                    <Image
                        css={cBCImage}
                    />
                    <Button css={cBCButton}>
                        <Typography>Amazon</Typography>
                    </Button>
                    <Typography css={cBCTypography}>https://amazon.com</Typography>
                </CardContent>
                <CardContent css={cBContent}>
                    <Image
                        css={cBCImage}
                    />
                    <Button css={cBCButton}>
                        <Typography>Amazon</Typography>
                    </Button>
                    <Typography css={cBCTypography}>https://amazon.com</Typography>
                </CardContent>
            </Box>
        </div>
    )
}

const container = css``

const containerBox = css`
    border: 1px solid;
`

const cBContent = css`
    display: flex;
    align-items: center;
    height: 60px;
    padding: 0;
`

const cBCImage = css`
    font_size: 60px;
`

const cBCButton = css``

const cBCTypography = css``