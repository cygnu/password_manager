import { useState } from 'react'
import axios from 'axios'
import { Content } from '../types/Content'

const getContents = async () => {
  const { data } = await axios.get('api/contents')
  return data
}

const createContent = async (content_name: string) => {
  const { data } = await axios.post<Content>('api/contents', {
    content_name: content_name
  })
  return data
}

const getContent = async (content_id: number) => {
  const { data } = await axios.get(`api/content/${content_id}`)
  return data
}

const updateContent = async ({ content_id, content }: { content_id: number; content: Content }) => {
  const { data } = await axios.put<Content>(`api/content/${content_id}`, content)
  return data
}

const deleteContent = async (content_id: number) => {
  const { data } = await axios.delete<Content>(`api/content/${content_id}`)
  return data
}

export { getContents, createContent, getContent, updateContent, deleteContent }
